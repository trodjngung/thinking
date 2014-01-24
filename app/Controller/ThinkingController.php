<?php
class ThinkingController extends AppController {
	public $helpers = array('Html', 'Form');

	public function beforeFilter() {
		parent::beforeFilter();
        $this->Auth->allow('question');
    }

	public function index() {

	}

	public function view() {

	}

	//Hien thi trang ket qua
	public function result($peopleId=null,$count_people=null) {
		$Peoples = $this->csv('People');
		$people = $Peoples->find($Peoples->data,$peopleId,'id');

		$this->set('peopleId',$people[0]['id']);
		$this->set('peopleName',$people[0]['name']);
		$this->set('count_people',$count_people);
	}

	//Ham dua ra cau hoi
	public function question($reply = null) {
		$questionList = $this->csv('Questions');
		$inQuestionList = $this->csv('InQuestion');
		$idQuestionList = range(1,count($questionList->data));
		$peopleList = $inQuestionList->data;

		//Dua ra cau hoi random khi bat dau choi
		if($reply == null) {
			$this->Session->write('peopleList',$peopleList);
			$question_id = rand(1,count($questionList->data));
			$question = $questionList->data[$question_id-1];
			$this->Session->write('question_id',$question_id); //Luu id cau hoi vao session
			unset($idQuestionList[$question_id-1]); //Xoa cau da dc hoi khoi ds
			$this->Session->write('idQuestionList',$idQuestionList); //Luu lai ds cau hoi vao session

			$this->set('question',$question['questions']);
			$this->set('rand',$question_id);
		} elseif($reply == 1) {
			$question_id = $this->Session->read('question_id');
			$this->questionYesOrNo($reply,$question_id,$inQuestionList,$questionList);
		} elseif($reply == 0) {
			$question_id = $this->Session->read('question_id');
			$this->questionYesOrNo($reply,$question_id,$inQuestionList,$questionList);
		} else {
			$this->redirect(array('controller'=>'thinking','action'=>'index'));
		}
	}

	/*
	 * Ham su ly khi nguoi dung chon Yes hoac No
	 */
	public function questionYesOrNo($reply,$question_id=null,$inQuestionList,$questionList)
	{
		$data = $this->Session->read('peopleList');
		//Danh sach nguoi khi chon dap an cua cau hoi
		$peopleList = $inQuestionList->find($data,$reply,'q_'.$question_id);

		//Neu con lai nguoi duy nhat thi in ra trang nguoi do
		if(count($peopleList) == 1) {
			$this->redirect(array('controller'=>'thinking','action'=>'result',$peopleList[0]['people_id']));

		} else {  //Chua tim dc nguoi thi tiep tuc ra cau hoi
			$this->Session->delete('peopleList');
			$this->Session->write('peopleList',$peopleList);

			//Doc ds cau hoi
			$idQuestionList = $this->Session->read('idQuestionList');
			// `echo $idQuestionList >> /data/home/lucct/tmp/debug`;
			foreach ($idQuestionList as $value) {
				// die(var_dump($idQuestionList).'abc'.var_dump($value));
				$dataTemp = $inQuestionList->find($peopleList,1,'q_'.$value);
				if(count($dataTemp) == null || count($dataTemp) == count($peopleList)) {
					unset($idQuestionList[$value-1]);
					//Ham unset se delete theo key, khong theo gia tri unset($idQuestionList[0]) xoa thang o vi tri 0
				}
			}
			if(empty($idQuestionList)) {
				$this->redirect(array('controller'=>'thinking','action'=>'result',0,count($peopleList)));
			} else {
				$question_id = array_rand($idQuestionList,1); //Chon cau hoi random trong ds cau hoi do
				unset($idQuestionList[$question_id]);
				$this->Session->write('idQuestionList',$idQuestionList); //Luu lai ds cau hoi
				$this->Session->write('question_id',$question_id + 1); //Luu cau doi da chon
			}

			//Doc cau hoi theo id da chon o tren
			$question = $questionList->data[$question_id];
			$this->set('question',$question['questions']);
			$this->set('rand',$question_id + 1);
		}
	}

}
