<?php
/**
 *
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magestore\Student\Controller\Index;

class DeleteStudent extends \Magento\Framework\App\Action\Action
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
        $studentId = 1;
        $isDelete = $this->studentRepository->deleteStudent($studentId);
        if($isDelete) {
            echo 'Delete student success.';
        } else {
            echo 'Action Fail, please try again.';
        }
    }
}
