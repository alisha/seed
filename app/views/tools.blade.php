@extends('_master')

@section('title')
	 @parent
	 - Resources
@stop

@section('content')
	<h1>Tools</h1>
	<div class="list-group">
		<div class="list-group-header">
		    <h3 class="list-group-item-title">M.I.T. Open Courseware</h3>
		</div>
		<a href="/var/www/seed/public/hdd/data/mit1/contents/Syllabus/index.htm" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Introduction to Computer Science and Programming</h4>
  		</a>
  		<a href="/hdd/data/mit2/contents/Syllabus/index.htm" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Introduction to Electrical Engineering and Computer Science I</h4>
  		</a>
  		<a href="/public/hdd/data/mit3/contents/Syllabus/index.htm" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Introduction to Computers and Engineering Problem Solving</h4>
  		</a>
	</div>

	<div class="list-group">
		<div class="list-group-header">
		    <h3 class="list-group-item-title">Wikipedia for Students</h3>
		</div>
		<a href="/hdd/data/wikipedia/index.htm" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Access to the best Wikipedia articles for students</h4>
  		</a>
	</div>

	<div class="list-group">
		<div class="list-group-header">
		    <h3 class="list-group-item-title">Free the Children PDFs</h3>
		</div>
		<a href="var/www/seed/hdd/data/ftc/educators.pdf" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Educator's Guide</h4>
  		</a>
  		<a href="seed/hdd/data/ftc/arg/Elementary.pdf" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Agriculture and Food Security, Elementary Lesson Package</h4>
  		</a>
  		<a href="/seed/hdd/data/ftc/arg/Secondary.pdf" target="_blank" class="list-group-item">
		    <h4 class="list-group-item-title">Agriculture and Food Security, Secondary Lesson Package</h4>
  		</a>
	</div>
@stop