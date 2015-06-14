@extends('admin.layouts.master')

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Category</h1>
    </div>
  </div>
  
  <a href="{{URL::route('admin.category.add')}}" class="btn badge btn-info">+ Add New Data</a>
  
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
				"sAjaxSource" : "{{URL::route('admin.category.list')}}",
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
					aoData.push({"name":"filter", "value":$('input[type="radio"]:checked').val() });
					},
				"fnDrawCallback": function ( oSettings ) {
					var text;
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ ){		
						$('td:eq(<?php echo $num_fields - $hidden_field ?>)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html("<table><tr><td><a href=\"{{URL::Route('admin.category.edit',array('id' => ''))}}/"+oSettings.aoData[i]._aData[0]+"\" class=\"btn btn-primary btn-xs\">EDIT</a></td>"
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
					url: "{{URL::route('admin.category.delete')}}",  //Server script to process data
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