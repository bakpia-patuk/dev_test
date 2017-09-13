<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_user_c extends CI_Controller {

	public function index()
	{
		$this->load->view('show_user_v');
	}

	function show_user(){
		$this->load->model('show_user_m');
		
		$result = $this->show_user_m->show_user();
		$table = '';
		$i=1;
		if($result){
			$table = '
			<div class="bs-example">
			    <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>USER NAME</th>
						</tr>
					</thead>
			        <tbody>	';
			foreach ($result->result() as $row) {
				$table .= '
			            <tr >
			                <td>'.$i++.'</td>
			                <td onclick="show_user_detail(\''.$row->ic.'\')">'.$row->user_name.'</td>
			            </tr>
				';
			}
		}else{echo 'empty data';}
		$table .= '
			        </tbody>
			    </table>
			</div>';
		echo $table;

	}

	function show_user_detail(){
		$this->load->model('show_user_m');

		$ic = $this->input->post('ic');

		$result = $this->show_user_m->show_user_detail($ic);
		$table = '';
		$i=1;
		if($result){
			$table = '
			<div class="bs-example">
			    <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>IC</th>
							<th>USER NAME</th>
							<th>GENDER</th>
							<th>JOINED DATE</th>
							<th>GROUP</th>
							<th>REMARKS</th>
							<th>PHOTO</th>
						</tr>
					</thead>
			        <tbody>	';
			foreach ($result->result() as $row) {
				$table .= '
			            <tr>
			                <td>'.$i++.'</td>
			                <td>'.$row->ic.'</td>
			                <td>'.$row->user_name.'</td>
			                <td>'.$row->gender.'</td>
			                <td>'.$row->join_date.'</td>
			                <td>'.$row->group_name.'</td>
			                <td>'.$row->remark.'</td>
			                <td>'.$row->photo.'</td>
			            </tr>
				';
			}
		}else{echo 'empty data';}
		$table .= '
			        </tbody>
			    </table>
			</div>
			<button type="submit" onclick="edit_user_detail(\''.$row->ic.'\')" class="btn btn-primary">Edit User</button>
			';

		echo $table;

	}

	function edit_user_detail(){
		$this->load->model('show_user_m');

		$ic = $this->input->post('ic');

		$result = $this->show_user_m->show_user_detail($ic);
		$table = '';
		$id = $user_name = $gender = $join_date = $group_name = $remark = $photo = '';

		if($result){
			foreach ($result->result() as $row) {
				$id 		= $row->ic;
				$user_name 	= $row->user_name;
				$gender 	= $row->gender;
				$join_date 	= $row->join_date;
				$group_name = $row->group_name;
				$remark 	= $row->remark;
				$photo 		= $row->photo;
			}
		}else{
				$id 		= '';
				$user_name 	= '';
				$gender 	= '';
				$join_date 	= '';
				$group_name = '';
				$remark 	= '';
				$photo 		= '';
		}

		$table .= '
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="ic" id="ic" class="form-control" placeholder="IC" value="'.$id.'" disabled>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="USER NAME" value="'.$user_name.'">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="gender" id="gender" class="form-control" placeholder="GENDER" value="'.$gender.'">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="join_date" id="join_date" class="form-control" placeholder="JOIN DATE" value="'.$join_date.'">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="group_name" id="group_name" class="form-control" placeholder="GROUP" value="'.$group_name.'">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="remark" id="remark" class="form-control" placeholder="REMARK" value="'.$remark.'">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" name="photo" id="photo" class="form-control" placeholder="PHOTO" value="'.$photo.'">
					</div>
				</div>	
				<div class="form-group">
					<div class="col-sm-10">
						<button type="submit" onclick="edit_user_detail(\''.$id.'\')" class="btn btn-primary">Save User</button>
					</div>
				</div>
			</form>
		';

		echo $table;

	}

	function simpan_user(){
		$this->load->model('show_user_m');

		$ic = $this->input->post('ic');
		$aksi = '';

		$data = array(
			'user_name' => $this->input->post('user_name'),
			'gender' 	=> $this->input->post('gender'),
			'join_date' => $this->input->post('join_date'),
			'group' 	=> $this->input->post('group'),
			'remark' 	=> $this->input->post('remark')
		);
		if($aksi == 'ADD'){ $this->show_user_m->edit_user_detail($ic,$data); }
		else{ $this->show_user_m->edit_user_detail($ic,$data);}
	}

	function show_group(){
		$this->load->model('show_user_m');
		
		$result = $this->show_user_m->show_group();
		$table = '';
		$i=1;
		if($result){
			$table = '
			<div class="bs-example">
			    <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>GROUP NAME</th>
						</tr>
					</thead>
			        <tbody>	';
			foreach ($result->result() as $row) {
				$table .= '
			            <tr>
			                <td>'.$i++.'</td>
			                <td onclick="show_group_detail(\''.$row->id.'\')">'.$row->group_name.'</td>
			            </tr>
				';
			}
		}else{echo 'empty data';}
		$table .= '
			        </tbody>
			    </table>
			</div>';
		echo $table;

	}

	function show_group_detail(){
		$this->load->model('show_user_m');

		$ic = $this->input->post('ic');

		$result = $this->show_user_m->show_group_detail($ic);
		$table = '';
		$i=1;
		if($result){
			$table = '
			<div class="bs-example">
			    <table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>ID</th>
							<th>GROUP NAME</th>
							<th>ENTRY DATE</th>
							<th>NUMBER OF USER</th>
						</tr>
					</thead>
			        <tbody>	';
			foreach ($result->result() as $row) {
				$table .= '
			            <tr>
			                <td>'.$i++.'</td>
			                <td>'.$row->id.'</td>
			                <td>'.$row->group_name.'</td>
			                <td>'.$row->entry_date.'</td>
			                <td>'.$row->num_user.'</td>
			            </tr>
				';
			}
		}else{echo 'empty data';}
		$table .= '
			        </tbody>
			    </table>
			</div>
			<button type="submit" onclick="edit_group_detail(\''.$row->id.'\')" class="btn btn-primary">Edit User</button>
			';

		echo $table;

	}	

	function edit_group_detail(){
		$this->load->model('show_user_m');

		$ic = $this->input->post('ic');

		$result = $this->show_user_m->show_group_detail($ic);
		$table = '';

		if($result){
			foreach ($result->result() as $row) {
				$table .= '
					<form class="form-horizontal">
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="id" id="id" class="form-control" placeholder="ID" value="'.$row->id.'" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="group_name" id="group_name" class="form-control" placeholder="GROUP NAME" value="'.$row->group_name.'">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="entry_date" id="entry_date" class="form-control" placeholder="ENTRY DATE" value="'.$row->entry_date.'">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<input type="text" name="num_user" id="num_user" class="form-control" placeholder="NUMBER OF USER" value="'.$row->num_user.'" disabled>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10">
								<button type="submit" onclick="edit_user_detail(\''.$row->id.'\')" class="btn btn-primary">Save User</button>
							</div>
						</div>
					</form>
				';
			}
		}else{echo 'empty data';}
		echo $table;

	}
}

/* End of file show_user_c.php */
/* Location: ./application/controllers/show_user_c.php */