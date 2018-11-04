<?php
/**
 * Created by PhpStorm.
 * User: Mehdi
 * Date: 09/30/2018
 * Time: 18:45
 */

namespace Plugin_Name_Dir\Includes\Functions;


class Pagination {
	public $page_Number;
	public $number_Of_Records_Per_Page;
	public $total_Rows;
	public $total_Pages;
	public $offset;

	public function __construct( $pageno, $total_rows ) {
		$this->number_Of_Records_Per_Page = 2;
		$this->total_Rows                 = $total_rows;
		$this->total_Pages                = ceil( $this->total_Rows / $this->number_Of_Records_Per_Page );
		$this->page_Number                = $pageno;
		if ( $this->page_Number == 0 ) {
			$this->page_Number ++;
		}
		if ( $this->page_Number > $this->total_Pages ) {
			$this->page_Number = 1;
		}

		$this->offset = ( $this->page_Number - 1 ) * $this->number_Of_Records_Per_Page;

	}


}