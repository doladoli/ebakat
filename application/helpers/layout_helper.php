<?php

function echo_table_title($title, $button=false, $onclick="")
{
	if ($button)
	{
		$button = '<div class="input-group-btn">
                        <button class="btn btn-sm btn-default  pull-right" id="btn_add" onclick="'.$onclick.'">
                        	<i class="fa fa-plus-square"></i>
                        </button>
                      </div> ';
	}
	$s = '<div class="box-header">
                  <h3 class="box-title">'.$title.'</h3>
                  <div class="box-tools">
					<div class="input-group">
                      <!--
					  <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                      -->
					  '.$button.'
                    </div>
                  </div>
                </div>';
				
	echo $s;
}

function echo_table_title1($title, $button=false)
{
	
	$s = '<div class="box-header">
                  <h3 class="box-title">'.$title.'</h3>
                  <div class="box-tools">
					<div class="input-group">
                      
					  <div class="input-group-btn">
                        <button class="btn btn-sm btn-default  pull-right" id="btn_add"><i class="fa fa-plus-square"></i></button>
                      </div> 
                    </div>
                  </div>
                </div>';
				
	echo $s;
}

function getic()
{
	return $_SESSION['icno'];	
}