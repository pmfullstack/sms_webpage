$( document ).ready(function() {	
	var table = $('.filter').DataTable( {
		"responsive": true,
		"order": [ 1, 'desc' ],
		"ajax": "../hr/action/walkin_serverside_query.php",
		"bPaginate":true,
        "processing": true,
        "orderCellsTop": true,
        "iDisplayLength": 50,
        "aLengthMenu": [[50, 100, 250, 500, -1], [50, 100, 250, 500, "All"]],
         initComplete: function () {
            this.api().columns([2,3,5,6,7,8,9,10,11,12,13,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,32,33,34]).every( function () {
                var column = this;
                var select = $('<select><option value="">Reset</option></select>')
                    .appendTo( $(".filter thead tr:eq(1) th").eq(column.index()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
		"columns": [
            {
                "data": null,
                "className": "text-centers",
                "render": function(data, type, full, meta, text){
                   if(type === 'display' && (full['status'] == "Selected" || full['status'] == "Join")){
                      data = '<a title="Edit" href="javascript:void(0)" class="btn btn-sm btn-primary shadow editbtn" data-toggle="modal" data-target="#editmodal" id="'+ full['uni_id'] +'"><i class="fas fa-edit"></i></a><hr style="margin: 5px 0 5px 0;"><a title="Salary" href="#" class="btn btn-sm btn-primary shadow salarybtn" data-toggle="modal" data-target="#salarymodal" id="'+ full['uni_id'] +'"><i class="fas fa-rupee-sign"></i></a><hr style="margin: 5px 0 5px 0;"><a title="offer Letter" target="_blank" href="offer_letter.php?id='+ full['uni_id'] +'" class="btn btn-sm btn-primary shadow"><i class="fas fa-envelope-open-text"></i></i></a><hr style="margin: 5px 0 5px 0;"><a title="Appoinment Letter" target="_blank" href="appointment_letter.php?id='+ full['uni_id']+'" class="btn btn-sm btn-primary shadow"><i class="far fa-calendar-check"></i></a><hr style="margin: 5px 0 5px 0;">';
                   }
                  else if(type === 'display'){
                    data = '<a title="Edit" href="javascript:void(0)" class="btn btn-sm btn-primary shadow editbtn" data-toggle="modal" data-target="#editmodal" id="'+ full['uni_id'] +'"><i class="fas fa-edit"></i></a><hr style="margin: 5px 0 5px 0;"><a title="Salary" href="#" class="btn btn-sm btn-primary shadow salarybtn" data-toggle="modal" data-target="#salarymodal" id="'+ full['uni_id'] +'"><i class="fas fa-rupee-sign"></i></a><hr style="margin: 5px 0 5px 0;"><a title="offer Letter" target="_blank" href="offer_letter.php?id='+ full['uni_id'] +'" onclick="return false;" class="btn btn-sm btn-primary shadow"><i class="fas fa-envelope-open-text"></i></i></a><hr style="margin: 5px 0 5px 0;"><a title="Appoinment Letter" target="_blank" href="appointment_letter.php?id='+ full['uni_id']+'" onclick="return false;" class="btn btn-sm btn-primary shadow"><i class="far fa-calendar-check"></i></a><hr style="margin: 5px 0 5px 0;">';
                    }
    
                   return data;
                }
            },
            {
                "data": null,
                render: function (data, type, row) {
					if (row.duplicate == "Duplicate") {
                        data = '<span style="text-align:center !important;font-weight:bold;color:#4607fd">'+ row['l_id'] +'</span>';
                    }else{
                        data = '<span style="text-align:center !important;">'+ row['l_id'] +'</span>';
                    }
                    return data;
				},
            },
            { mData: 'cn',
                "className": "text-centers", },
            { mData: 'duplicate',
                "className": "text-centers", },
            {
                "data": null,
                render: function (data, type, row) {
                    if (!row.profile == '') {
                        data = '<img style="border-color: #d3d300;" src="../images/employee_profile/'+ row.profile +'" alt="" height="80" width="80">';
                    }else{
                        data = '<img style="border-color: #d3d300;" src="../images/employee_profile/avatar.png" alt="" height="80" width="80">';
                    }
                    return data;
                },
            },    
            { mData: 'f_name',"className": "text-centers", },
            { mData: 'm_name',"className": "text-centers", },
            { mData: 'l_name',"className": "text-centers", },
            { mData: 'contact_no',"className": "text-centers", } ,
            { mData: 'designation',"className": "text-centers", },
            { mData: 'status',"className": "text-centers", },
            { mData: 'email',"className": "text-centers", },
			{ mData: 'dob',"className": "text-centers", },
            { mData: 'gender',"className": "text-centers", },
            { mData: 'is_time',"className": "text-centers", },
            { mData: 'salary',"className": "text-centers", },
            { mData: 'bsalary',"className": "text-centers", },
            { mData: 'ctc',"className": "text-centers", },
            { mData: 'net_pay',"className": "text-centers", },
            { mData: 'interview_scduled_by',"className": "text-centers", },
            { mData: 'interview_by',"className": "text-centers", },
            { mData: 'interview_comnts',"className": "text-centers", },
            { mData: 'comments1',"className": "text-centers", },
            { mData: 'comments5',"className": "text-centers", },
            { mData: 'comments6',"className": "text-centers", },
            { mData: 'comments2',"className": "text-centers", },
            { mData: 'comments3',"className": "text-centers", },
            { mData: 'comments7',"className": "text-centers", },
            { mData: 'comments4',"className": "text-centers", },
            { mData: 'rej_reason',"className": "text-centers", },
            {
                "data": null,
                render: function (data, type, row) {
                        data = '<a target="_blank" style="text-decoration: none;color: black;" href ="../images/walkin/'+ row.walk_in +'">'+ row.walk_in +'</a>';
                    return data;
                },
            },
            {
                "data": null,
                render: function (data, type, row) {
                        data = '<a target="_blank" style="text-decoration: none;color: black;" href ="../images/cv/'+ row.cv +'">'+ row.cv +'</a>';
                    return data;
                },
            },
            { mData: 'doj',"className": "text-centers", },
            { mData: 'dol',"className": "text-centers", },
            { mData: 'sub_time',"className": "text-centers", },
		]
	});	
	// setInterval( function () {
	// 	table.ajax.reload(null, false);
	// }, 10000 );	
});