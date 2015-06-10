@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">{{$title}}</h1>
    </div>
  </div>
  
  <a href="{{URL::route('admin.posts.add',array('type'=>$parameter['type'],'person'=>$parameter['person']))}}" class="btn badge btn-info">+ Add New Data</a>
  
  <hr/>
	<div class="table-responsive">
		<table class="table table-hover datatable">
			<thead>
				<tr>
				<?php
					foreach($fields as $field){
						echo "<th>".$field['alias']."</th>";
					}
				?>
				<th>Action</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	
	<div id="modalView" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Detail</h3>
				</div>
				<div class="modal-body">
					<table class="table table-hover">
						<tr>
							<td>Name</td>
							<td width="10px">:</td>
							<td id="lblName"></td>
						</tr>
						<tr>
							<td>Address</td>
							<td>:</td>
							<td id="lblAlamat"></td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td>:</td>
							<td id="lblProvinsi"></td>
						</tr>
						<tr>
							<td>Kota</td>
							<td>:</td>
							<td id="lblKota"></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td>:</td>
							<td id="lblKecamatan"></td>
						</tr>
						<tr>
							<td>Longitude</td>
							<td>:</td>
							<td id="lblLongitude"></td>
						</tr>
						<tr>
							<td>Latitude</td>
							<td>:</td>
							<td id="lblLatitude"></td>
						</tr>
						<tr>
							<td>Type</td>
							<td>:</td>
							<td id="lblType"></td>
						</tr>
						<tr>
							<td>Available Beer</td>
							<td>:</td>
							<td id="lblBeer"></td>
						</tr>
						<tr>
							<td>Created Date</td>
							<td>:</td>
							<td id="lblDate"></td>
						</tr>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@stop
	
@section('scripts')
	<script>	
		$('#option1').prop('checked', true);
		$(document).ready(function(){
			<?php $hidden_field = 0; ?>
			$('.radio-1').click(function(){
				setTimeout(reDrawDataTable,1);
			});
			var oTable = $(".datatable").dataTable({
				"sPaginationType": "full_numbers",
				"sAjaxSource" : "{{URL::route('admin.posts.list')}}",
				'iDisplayLength' : 25,
				"aaSorting": [[ 4, "desc" ]],
				'aafilter':'yes',
				"aoColumns":[
						<?php 
						for($i=0;$i<$num_fields;$i++){
							echo '{';
							if($fields[$i]['hidden'] == true){
								echo '"bSearchable": false,"bVisible": false';
								$hidden_field++;
							}
							elseif($fields[$i]['unsearchable'] == true){
								echo '"bSearchable": false';
							}
							echo '},';
						}
						?>
						
					{"bSortable": false}
					],
				"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [1,2,3,4] }
					],
				'bServerSide': true,
				"fnServerParams":function (aoData) {
					aoData.push({"name":"type", "value":"{{$parameter['type']}}" });
					aoData.push({"name":"person", "value":"{{$parameter['person']}}" });
					},
				"fnDrawCallback": function ( oSettings ) {
					var text;
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ){		
						$('td:eq(<?php echo $num_fields - $hidden_field ?>)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html("<table><tr><td><a href=\"{{URL::Route('admin.posts.edit',array('id' => ''))}}/"+oSettings.aoData[i]._aData[0]+"\" class=\"btn btn-primary btn-xs\">EDIT</a></td>"
						+"<td><a href=\"javascript:void(0)\" onclick=\"deleteRow("+oSettings.aoData[i]._aData[0]+")\" class=\"btn btn-danger btn-xs\">DELETE</a></td></tr>"
						+"</table>");
					}
				}                            
			});
			$('input[aria-controls="DataTables_Table_0"]').unbind();
			$('input[aria-controls="DataTables_Table_0"]').bind('keyup', function(e) {
				if(e.keyCode == 13) {
					oTable.fnFilter(this.value);   
				}
			});
			
			$('#btnExcel').click(function(){
				$("#modalExcel").modal('show');
			});
		});
		
		function reDrawDataTable(){
			//$(".datatable").dataTable().fnClearTable();
			$(".datatable").dataTable().fnDraw();
		}
		
		function deleteRow(id){
			if(confirm("Are you sure you want to delete this row?")){
				$.ajax({
					url: "{{URL::route('admin.posts.delete')}}",  //Server script to process data
					type: 'POST',
					dataType: 'json',
					data: "id="+id,
					cache: false,
					success: function(data){
						if(data == 1){
							$(".datatable").dataTable().fnClearTable();
						}
						else{
							alert('Bad request');
						}
					}
				});
			}
			return false;
		}
	</script>
@stop