<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_user_m extends CI_Model {

	function show_user(){
		$q = $this->db->query("
				select
					ic
					, a.user_name
					, a.gender
					, date_format(a.join_date, '%m/%d/%Y' ) as join_date
					, a.group
					, b.group_name
					, a.photo
				from user a
				left join group_user b on a.group = b.id
			");

		return $q;
	}

	function show_user_detail($ic){
		$q = $this->db->query("
				select
					ic
					, a.user_name
					, a.gender
					, date_format(a.join_date, '%m/%d/%Y' ) as join_date
					, a.group
					, b.group_name
					, a.photo
					, a.remark
				from user a
				left join group_user b on a.group = b.id
				where 1=1
					and a.ic = '".$ic."'
			");

		return $q;
	}

	function add_user_detail($data){
		$this->db->insert('user',$data);
	}

	function edit_user_detail($ic,$data){
		$this->db->where('ic',$ic);
		$this->db->update('user',$data);
	}

	function show_group(){
		$q = $this->db->query("
				select
					id
					, a.group_name
					, date_format(a.entry_date, '%m/%d/%Y' ) as entry_date
				from group_user a
			");

		return $q;
	}

	function show_group_detail($ic){
		$q = $this->db->query("
				select
					id
					, a.group_name
					, date_format(a.entry_date, '%m/%d/%Y' ) as entry_date
					, num_user
				from group_user a
				where 1=1
					and a.id = '".$ic."'
			");

		return $q;
	}
}

/* End of file show_user_m.php */
/* Location: ./application/models/show_user_m.php */ ?>