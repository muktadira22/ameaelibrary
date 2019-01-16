@extends("templates/header")

@section('content')
	<div class="container-fluid">
		<a href="#buku" class="btn btn-primary" id="btnGetBuku">GET AJAX</a>
		<div id="page">
			
		</div>
	</div>
@endsection

@push('script')
	<script type="text/javascript">
		$(function(){
			$("#btnGetBuku").click(function(){
				// $("#page").text("what up guys!!");
			});
		});
	</script>
@endpush