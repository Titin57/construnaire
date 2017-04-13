<?php

namespace Controller;


use \W\Controller\Controller;
use Model\OutputModel;

class OutputController extends Controller
{
	public function output()
	{
		$this->show('output/output');
	}
}
