/**
 * Created by m418485 on 16/03/2017.
 */

$(document).ready(function () {
    // Setup - add a text input to each footer cell

    var table= $("#mytable").DataTable({
        colReorder: true,
        rowReorder: true,

        select : true,
        buttons: [
            {
                extend : 'copy', text : 'Copy', className : 'btn btn-primary',
                key: {
                    key: 'c',
                    altKey: true
                }
            },
            {
                extend : 'excel', text : 'Excel', className : 'btn btn-success',
                key: {
                    key: 'x',
                    altKey: true
                }
            },
            {
                extend : 'pdf', text : 'PDF', className : 'btn btn-danger',
                key: {
                    key: 'p',
                    altKey: true
                }
            }
        ]
    } );

    $('#mytable tfoot th').each( function () {
        var title = $('#mytable thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );


// Apply the filter
    $("#mytable tfoot input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );

    table.buttons().container()
        .appendTo( $('.col-sm-6:eq(0)', table.table().container() ) );
    $('#mytable tfoot tr').appendTo('#mytable thead');

    var init_label = table.column(0,{search:'applied'}).data();
    var init_data = table.column(1,{search:'applied'}).data()?table.column(1,{search:'applied'}).data().map(Number):null;
    var linechart = new Highcharts.Chart({
        chart: {
            renderTo:"linechart",
            zoomType:'xy'
        },
        title: {
            text: 'Identifiction des erreur lors du contrôle DSI/SOX'
        },
        xAxis: {
            categories: init_label
        },
        yAxis: {
            title: {
                text: 'Nombre erreurs'
            }

        },
        credits: {
            enabled: false
        },
        plotOptions:{
            series:{
                dataLabels:{

                    format:'{y}%'
                }
            }
        },
        series: [
            {
                data: init_label
            }
        ]
    });

    table.on('draw column-reorder', function () {
        linechart.xAxis[0].setCategories(table.column(0,{search:'applied'}).data());
        $(linechart.series).each(function(i, serie){
            serie.setData(table.column(1,{search:'applied'}).data().map(Number));
        })
    } );

    $('#mytable tr td').css('white-space','nowrap');
});