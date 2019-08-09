<?php

namespace Managers;

use Helpers\UrlHelper;
use Models\TaskModel;

class TaskManager extends AbstractManager {
	
	public function getByUid($uid){		

		$stmt = $this->dbConnection->getConnection()->prepare("SELECT id, name, email, content, status FROM tasks WHERE id = ?");
		$stmt->bind_param('s', $uid);

		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $content, $status);
		if($stmt->fetch()) {
			$task = new TaskModel();
			$task->id = $id;
			$task->name = $name;
			$task->email = $email;
			$task->content = $content;
			$task->status = $status;
			return $task;
		} else {
			return false;
		}
		$stmt->close;
	}		
	
	public function getAll($params){

		$per_page = 3;
		$page = 1;

		if(!empty($params['page']) && (int)$params['page']){
			$page = $params['page'];
		}

		if(!empty($params['per-page']) && (int)$params['per-page']){
			$per_page = $params['per-page'];
		}

		$first_element = ($page - 1)*$per_page;
		$limit = " LIMIT $first_element, $per_page";

		$request_string = "SELECT id, name, email, content, status FROM tasks";				

		$order = '';
		
		if(!empty($params['order'])){			
			$order = ' ORDER BY '.$params['order'].' '.$params['order-type'];
		}

		$stmt = $this->dbConnection->getConnection()->prepare($request_string.$order.$limit);

		$stmt->execute();
		$stmt->bind_result($id, $name, $email, $content, $status);		

		$allItems = [];

		while($stmt->fetch()){
			
			$allItems[] = [
				'id' => $id, 
				'name' => $name, 
				'email' => $email, 
				'content' => $content,
				'status' => $status
			];

		}
		
		$stmt->close();		

		return $allItems;
	}
	
	public function getPagination($params){
		
		$baseUrl = UrlHelper::pemovePage();				
		
		// get total nums
		$per_page = 3;
		$page = 1;

		if(!empty($params['page']) && (int)$params['page']){
			$page = $params['page'];
		}

		if(!empty($params['per-page']) && (int)$params['per-page']){
			$per_page = $params['per-page'];
		}

		$request_string = "SELECT COUNT(*) FROM tasks";
				
		$stmt = $this->dbConnection->getConnection()->prepare($request_string);

		$stmt->execute();
		$stmt->bind_result($items_count);		

		$stmt->fetch();
		$stmt->close();

		//get pages count
		$pages_total = ceil($items_count/$per_page);
		
		$items = [];		

		if($page!=1){

			$items[] = ['presentation'=>'<<','url' => $baseUrl];

			$items[] = ['presentation'=>'<','url' => $baseUrl.'/page/'.($page-1)];

			$prev_items = [];

			for($i=$page-1; $i > 0; $i--){
				if(count($prev_items)>=5) break;
				$prev_items[] = ['presentation'=>$i,'url'=>$baseUrl.(($i!=1)?'/page/'.$i:'')];
			}

			for($i=count($prev_items)-1; $i >= 0; $i--){
				$items[] = $prev_items[$i];
			}
		}

		if(!($page==1 && $page==$pages_total))
			$items[] = ['presentation'=>$page];

		$steps = 0;
		if($page!=$pages_total){
			for($i=$page+1; $i <= $pages_total && $steps < 5; $i++){
				$steps++;
				$items[] = ['presentation'=>$i,'url'=>$baseUrl.'/page/'.$i];
			}
			$items[] = ['presentation'=>'>','url'=>$baseUrl.'/page/'.($page+1)];
			$items[] = ['presentation'=>'>>','url'=>$baseUrl.'/page/'.$pages_total];
		}
		return $items;
	}

}

