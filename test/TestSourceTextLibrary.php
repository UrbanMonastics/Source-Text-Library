<?php

use UrbanMonastics\SourceTextLibrary\SourceTextLibrary as SourceTextLibrary;

class TestSourceTextLibrary extends SourceTextLibrary{
	public function getTextLevelElements(){
		return $this->textLevelElements;
	}
}
?>