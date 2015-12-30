<?php
class Member
{
	private $_params;
	
	public function __construct($params)
	{
		$this->_params = $params;
	}
	
	public function getmembersAction()
	{	
		//create a new todo item
		$memberItem = MemberItem::getmemberAction($this->_params['username'], $this->_params['userpass']);
		
		//return the todo item in array format
		return $memberItem;
	}
	public function getmemberselectAction(){
		if(isset($this->_params['member_id'])){
			$memberItem = MemberItem::find($this->_params['member_id']);
			return $memberItem->getMemberSelect($memberItem);
		}
		return [];
	}
	public function getmemberchildsAction(){
		if(isset($this->_params['member_id'])){

			$memberItem = MemberItem::find($this->_params['member_id']);
			$html = $memberItem->getchildshtml();
			//return the todo item in array format
			return $html;
		}
		return '';
	}

}