<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Student\Controller\Index;

class SaveStudent extends \Magento\Framework\App\Action\Action
{

    protected $context;

    protected $student;

    protected $studentRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magestore\Student\Api\Data\StudentInterfaceFactory $student,
        \Magestore\Student\Api\StudentRepositoryInterface $studentRepository
    )
    {
        $this->context = $context;
        $this->student = $student;
        $this->studentRepository = $studentRepository;
        parent::__construct($context);
    }
    /**
     * @return void
     */
    public function execute()
    {
        $student1 = $this->student->create();
        $student1->setStudentFullname('Student 2');
        $student1->setStudentClass('Class 1');
        $student1->setStudentUni('University 1');
        $newStudent = $this->studentRepository->saveStudent($student1);
        if($newStudent) {
            echo 'Add new student to database success.';
        } else {
            echo 'Add new student to database failed, please try again!';
        }
    }

    public function listStudent()
    {
        $studentList = $this->studentRepository->getListStudent();
        var_dump($studentList->getData());die();
    }

    public function deleteStudent()
    {
        $isDelete = $this->studentRepository->deleteStudent();
        if($isDelete) {
            echo 'Delete all student success.';
        } else {
            echo 'Action Fail, please try again.';
        }
    }
}
