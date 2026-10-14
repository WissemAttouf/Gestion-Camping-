@extends('crudbooster::admin_template')

@section('content')
<?php
$privilege=CRUDBooster::Myprivilegeid();
if($privilege==3)
{

	header('location:../public/');
	exit;
}
?>

@endsection
