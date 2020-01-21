<?php

/** @property services_model $services_model *
 */
class Test extends Front_end
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('test_model');
        $this->load->library('form_validation');
        $this->load->library(array('googlemaps')); 

    }


    // this function will redirect to book service page
    function index()
    {
        $this->tampil();
    }

    // this function to load service book page
    function tampil()
    {

        $this->view('content/tampil');

    }

    function simpan()
    {
        $valid=$this->form_validation;
        $valid->set_rules('latitude1','latitude','required',array('required' =>'%s Harus Diisi'));
        $valid->set_rules('longitude1','longitude','required',array('required' =>'%s Harus Diisi'));

        if($valid->run()==FALSE)
        {
            // $data['map'] = $this->googlemaps->create_map();
            $this->view('content/tampil', FALSE);
        }
            else
        {
            $i=$this->input;
            $data = array('latitude1' => $i->post('latitude1'),
                        'longitude1' => $i->post('longitude1')
                        );
            $this->test_model->add($data);
            $this->session->set_flashdata('sukses', 'Data Tersimpan');
            redirect(base_url('test/lanjut'), 'refresh');
        }


        }

    function simpan1()
        {
        $valid=$this->form_validation;
        $valid->set_rules('latitude2','latitude','required',array('required' =>'%s Harus Diisi'));
        $valid->set_rules('longitude2','longitude','required',array('required' =>'%s Harus Diisi'));

        if($valid->run()==FALSE)
        {
            // $data['map'] = $this->googlemaps->create_map();
            $this->view('content/tampil2', FALSE);
        }
            else
        {
            $i=$this->input;
            $data = array('latitude2' => $i->post('latitude2'),
                        'longitude2' => $i->post('longitude2'),
                        'hasil_jarak' => 0
                        );
            $this->test_model->add1($data);
            $this->session->set_flashdata('sukses', 'Data Tersimpan');
            redirect(base_url('test/pemetaan'), 'refresh');
        }


        }

    function lanjut()
        {

        $this->view('content/tampil2');

        }


    function demo()
        {

        $this->view('content/demo');

        }

   function haversine($id) 
            { 
            $explodeVal = explode('~', $id);
            // dari prodi
            $lat1 = -6.873776; 
            $lon1 = 107.575639;
            // target
            $lat2 = $explodeVal[0]; 
            $lon2 = $explodeVal[1];
            // distance between latitudes 
            // and longitudes 
            $dLat = ($lat2 - $lat1) * 
            M_PI / 180.0; 
            $dLon = ($lon2 - $lon1) * 
            M_PI / 180.0; 

            // convert to radians 
            $lat1 = ($lat1) * M_PI / 180.0; 
            $lat2 = ($lat2) * M_PI / 180.0; 

            // apply formulae 
            $a = pow(sin($dLat / 2), 2) + 
            pow(sin($dLon / 2), 2) * 
            cos($lat1) * cos($lat2); 
            $rad = 6371; 
            $c = 2 * asin(sqrt($a)); 
            $SimpanRad = $rad * $c; 
            // Driver code      
            $penjumlahan = $SimpanRad*1000; 
            $data['jsonarray'] = $penjumlahan.' METER';
            echo json_encode($data); 
        }

        public function pemetaan()
        {
        $this->load->library('googlemaps');
        $config['center'] = '-6.873074, 107.575958';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);
        $lokasi=$this->test_model->pemetaan();
        foreach ($lokasi as $key => $value) {
            $marker = array();
            $marker['animation'] = 'DROP';
            $marker['position'] = "$value->latitude1, $value->longitude1";
            $marker['infowindow_content'] = '<div class="media" style="height: 500px; width:500px;">';
            $marker['infowindow_content'] .= '<div class="media-left">';
            $marker['infowindow_content'] .= '</div>'; 
            $marker['infowindow_content'] .= '<div class="media-body">';
            $marker['infowindow_content'] .= '<a>'.$value->latitude1.'</a><br>';
            $marker['infowindow_content'] .= '<a>'.$value->longitude1.'</a><br>';
            $marker['infowindow_content'] .= '</div>';
            $marker['infowindow_content'] .= '</div>';
            $marker['icon'] = base_url('assets/icon/pin.png');

            $this->googlemaps->add_marker($marker);

        }

        $this->load->library('googlemaps');
        $config['center'] = '-6.873074, 107.575958';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);
        $lokasi=$this->test_model->pemetaan2();
        foreach ($lokasi as $key => $value) {
            $marker = array();
            $marker['animation'] = 'DROP';
            $marker['position'] = "$value->latitude2, $value->longitude2";
            $marker['infowindow_content'] = '<div class="media" style="height: 500px; width:500px;">';
            $marker['infowindow_content'] .= '<div class="media-left">';
            $marker['infowindow_content'] .= '</div>'; 
            $marker['infowindow_content'] .= '<div class="media-body">';
            $marker['infowindow_content'] .= '<a>'.$value->latitude2.'</a><br>';
            $marker['infowindow_content'] .= '<a>'.$value->longitude2.'</a><br>';
            $marker['infowindow_content'] .= '</div>';
            $marker['infowindow_content'] .= '</div>';
            $marker['icon'] = base_url('assets/icon/pin.png');

            $this->googlemaps->add_marker($marker);
        }

        $this->googlemaps->initialize($config);
        $map= $this->googlemaps->create_map();
        $data = array(
                        'map' =>$map
                    );
        $this->view('content/pemetaan', $data, FALSE);    
    }
}