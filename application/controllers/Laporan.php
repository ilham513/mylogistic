<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model
		$this->load->model('login_model');
		$this->load->model('crud_model');
		
		//variabel nama
		$this->data['nama'] = 'PT FESA ANTARAN LOGISTIK';
		$this->data['sidebar'] = 'laporan';
		
		//cek session
		$this->login_model->mengecek_session();
		
		include_once APPPATH . '/third_party/fpdf/fpdf.php';
	}

	public function index()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		//ambil data
		$data['array_laporan'] = $this->crud_model->mengambil_data_join('pengiriman');
		
		// var_dump($data['array_laporan']); die();
		
		//menampilkan view
		$this->load->view('laporan_view',$data);
	}
	
	public function interval()
	{
		//variabel nama
		$data['nama'] = $this->data['nama'];
		$data['sidebar'] = $this->data['sidebar'];
		
		$tanggal_awal = $this->input->get('tanggal_awal');
		$tanggal_akhir = $this->input->get('tanggal_akhir');
		
		//ambil data
		$data['array_laporan'] = $this->crud_model->mengambil_data_join_interval('pengiriman', $tanggal_awal, $tanggal_akhir);
		
		// var_dump($data['array_laporan']); die();
		
		//menampilkan view
		$this->load->view('laporan_view',$data);
	}
	
	public function pdf($id)
	{
		//variabel nama
		$nama = $this->data['nama'];

		//ambil data laporan
		$array_laporan = $this->crud_model->mengambil_data_join_id('pengiriman','pengiriman.id_pengiriman',$id);
		$obj_laporan = $array_laporan[0];

		// var_dump($obj_laporan);die();
		
		// intance object dan memberikan pengaturan halaman PDF
		$pdf=new FPDF('P','mm','A4');
		$pdf->AddPage();
		 
		$pdf->SetFont('Times','B',13);
		$pdf->Cell(200,10,'PDF Pengiriman',0,0,'C');
		 
		$pdf->Cell(10,15,'',0,1);
		$pdf->SetFont('Times','B',9);
		$pdf->Cell(140,7,$nama,1,0,'C');
		$pdf->Cell(50,7,'JKT0000000'.$obj_laporan->id_pengiriman ,1,0,'C');
		 
		 
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(70,6, 'Pengirim: '.$obj_laporan->nama_pelanggan,1,0);
		$pdf->Cell(70,6, 'Penerima: '.$obj_laporan->nama_penerima,1,0);
		$pdf->Cell(50,6, 'Jumlah: '.$obj_laporan->jumlah,1,0);  

		$pdf->Cell(10,6,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(70,6, 'Jenis Barang: '.$obj_laporan->jenis_barang,1,0);
		$pdf->Cell(70,6, 'Alamat: '.$obj_laporan->alamat_penerima. ' | Telpon:'.$obj_laporan->telp_penerima,1,0);
		$pdf->Cell(50,6, 'Harga: '.$obj_laporan->harga,1,0);  

		$pdf->Cell(10,6,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(50,6, 'Tanggal: '.$obj_laporan->tanggal,1,0);
		$pdf->Cell(45,6, 'Kurir: '.$obj_laporan->nama_kurir,1,0);
		$pdf->Cell(45,6, 'Penerima: '.$obj_laporan->nama_penerima,1,0);  
		$pdf->Cell(50,6, 'Berat: '.$obj_laporan->berat.' KG',1,0);  


		$pdf->Cell(10,15,'',0,1);
		$pdf->SetFont('Times','B',9);
		$pdf->Cell(140,7,$nama,1,0,'C');
		$pdf->Cell(50,7,'JKT0000000'.$obj_laporan->id_pengiriman ,1,0,'C');
		 
		 
		$pdf->Cell(10,7,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(70,6, 'Pengirim: '.$obj_laporan->nama_pelanggan,1,0);
		$pdf->Cell(70,6, 'Penerima: '.$obj_laporan->nama_penerima,1,0);
		$pdf->Cell(50,6, 'Jumlah: '.$obj_laporan->jumlah,1,0);  

		$pdf->Cell(10,6,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(70,6, 'Jenis Barang: '.$obj_laporan->jenis_barang,1,0);
		$pdf->Cell(70,6, 'Alamat: '.$obj_laporan->alamat_penerima. ' | Telpon:'.$obj_laporan->telp_penerima,1,0);
		$pdf->Cell(50,6, 'Harga: '.$obj_laporan->harga,1,0);  

		$pdf->Cell(10,6,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(50,6, 'Tanggal: '.$obj_laporan->tanggal,1,0);
		$pdf->Cell(45,6, 'Kurir: '.$obj_laporan->nama_kurir,1,0);
		$pdf->Cell(45,6, 'Penerima: '.$obj_laporan->nama_penerima,1,0);  
		$pdf->Cell(50,6, 'Berat: '.$obj_laporan->berat.' KG',1,0);  

		$pdf->Cell(10,6,'',0,1);
		$pdf->SetFont('Times','',10);

		$pdf->Cell(95,20, 'TTD Penerima: ......................',1,0,'C');
		$pdf->Cell(95,20, 'TTD Kurir: ......................',1,0,'C');

		$pdf->Output();
		
	}

	public function bulk_pdf()
	{
		//ambil data laporan centang
		$array_id = $this->input->post('bulk_id');
		$nama = $this->data['nama'];
		
		//buat pdf
		$pdf=new FPDF('P','mm','A4');
		
	
		// intance object dan memberikan pengaturan halaman PDF
		$pdf->AddPage(); 

		$pdf->SetFont('Times','B',13);
		$pdf->Cell(200,10,'Laporan Pengiriman Barang',0,0,'C');
			
		// Line break
		$pdf->Ln(7);		

		$pdf->SetFont('Times','B',13);
		$pdf->Cell(200,10,$this->data['nama'],0,0,'C');
			 
		$pdf->Cell(10,15,'',0,1);
		$pdf->SetFont('Times','B',9);
		$pdf->Cell(5,7,'No',1,0,'C');
		$pdf->Cell(25,7,'Tgl. Pengiriman' ,1,0,'C');
		$pdf->Cell(25,7,'Kode Resi' ,1,0,'C');
		$pdf->Cell(20,7,'Pengirim' ,1,0,'C');
		$pdf->Cell(10,7,'Kurir' ,1,0,'C');
		$pdf->Cell(20,7,'Penerima' ,1,0,'C');
		$pdf->Cell(20,7,'Alamat' ,1,0,'C');
		$pdf->Cell(15,7,'Jumlah' ,1,0,'C');
		$pdf->Cell(15,7,'Berat' ,1,0,'C');
		$pdf->Cell(15,7,'Harga' ,1,0,'C');
		$pdf->Cell(20,7,'Status' ,1,0,'C');
		 
		foreach($array_id as $i=>$id_laporan){
			//array data
			$array_laporan = $this->crud_model->mengambil_data_join_id('pengiriman','pengiriman.id_pengiriman',$id_laporan);
			$obj_laporan = $array_laporan[0];
			
			// var_dump($obj_laporan);die();
			
			 
			$pdf->Cell(10,6,'',0,1);
			$pdf->SetFont('Times','',10);

			$pdf->Cell(5,6, $i+1 ,1,0);
			$pdf->Cell(25,6, substr($obj_laporan->tanggal,0, 10),1,0);  					
			$pdf->Cell(25,6, 'JKT0000000'.$obj_laporan->id_pengiriman,1,0);
			$pdf->Cell(20,6, $obj_laporan->nama_pelanggan,1,0);  					
			$pdf->Cell(10,6, $obj_laporan->nama_kurir,1,0);  					
			$pdf->Cell(20,6, $obj_laporan->nama_penerima,1,0);  					
			$pdf->Cell(20,6, $obj_laporan->alamat_penerima,1,0);  					
			$pdf->Cell(15,6, $obj_laporan->jumlah,1,0);  					
			$pdf->Cell(15,6, $obj_laporan->berat,1,0);  					
			$pdf->Cell(15,6, $obj_laporan->harga,1,0);  					
			$pdf->Cell(20,6, $obj_laporan->nama_status,1,0);  					
		}

		// Line break
		$pdf->Ln(17);		

		$pdf->SetFont('Times','',10);
		$pdf->Cell(300,10,'Bogor, '.$this->crud_model->tanggal_indo(date("Y-m-d")),0,0,'C');

		// Line break
		$pdf->Ln(26);		

		$pdf->SetFont('Times','',10);
		$pdf->Cell(284,10,'TTD:   ',0,0,'C');

		$pdf->Output();
		
	}
}