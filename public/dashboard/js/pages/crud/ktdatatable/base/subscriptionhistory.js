'use strict';
// Class definition

var KTDatatableDataLocalDemo = function() {
    // Private functions

    // demo initializer
    var demo = function() {


        var dataJSONArray = JSON.parse('[{"RecordID":1,"OrderID":"0374-5070","Country":"China","ShipCountry":"CN","ShipCity":"Jiujie","ShipName":"Rempel Inc","ShipAddress":"60310 Schiller Center","CompanyEmail":"cdodman0@wsj.com","CompanyAgent":"Cordi Dodman","CompanyName":"Kris-Wehner","Currency":"CNY","Notes":"sed vel enim sit amet nunc viverra dapibus nulla suscipit ligula in lacus curabitur at ipsum ac tellus","Department":"Kids","Website":"tripadvisor.com","Latitude":39.952319,"Longitude":119.598195,"ShipDate":"8/27/2017","PaymentDate":"2016-09-15 22:18:06","TimeZone":"Asia/Chongqing","TotalPayment":"$336309.10","Status":6,"Type":2,"Actions":null},\n' +
            '{"RecordID":84,"OrderID":"0228-3003","Country":"Dominican Republic","ShipCountry":"DO","ShipCity":"Bajos de Haina","ShipName":"Grady-Connelly","ShipAddress":"2079 Larry Way","CompanyEmail":"cpaskerful2b@i2i.jp","CompanyAgent":"Cairistiona Paskerful","CompanyName":"Wiegand and Sons","Currency":"DOP","Notes":"habitasse platea dictumst morbi vestibulum velit id pretium iaculis diam erat fermentum justo","Department":"Computers","Website":"china.com.cn","Latitude":18.4091399,"Longitude":-70.031039,"ShipDate":"11/14/2016","PaymentDate":"2017-11-01 16:40:06","TimeZone":"America/Santo_Domingo","TotalPayment":"$612602.70","Status":2,"Type":1,"Actions":null},\n' +
            '{"RecordID":85,"OrderID":"36800-124","Country":"Mexico","ShipCountry":"MX","ShipCity":"El Rosario","ShipName":"Rogahn Group","ShipAddress":"5332 Cambridge Way","CompanyEmail":"gboggis2c@sbwire.com","CompanyAgent":"Godwin Boggis","CompanyName":"Cartwright, Mante and Kris","Currency":"MXN","Notes":"ut massa quis augue luctus tincidunt nulla mollis molestie lorem quisque ut erat curabitur","Department":"Automotive","Website":"flickr.com","Latitude":30.059549,"Longitude":-115.725753,"ShipDate":"1/13/2016","PaymentDate":"2016-01-24 18:48:06","TimeZone":"America/Mexico_City","TotalPayment":"$1014910.05","Status":5,"Type":2,"Actions":null},\n' +
            '{"RecordID":86,"OrderID":"59746-175","Country":"Philippines","ShipCountry":"PH","ShipCity":"Concepcion","ShipName":"Tromp, Wisozk and Stiedemann","ShipAddress":"74705 Oakridge Point","CompanyEmail":"khayzer2d@marriott.com","CompanyAgent":"Kirbie Hayzer","CompanyName":"Nicolas-Bayer","Currency":"PHP","Notes":"commodo vulputate justo in blandit ultrices enim lorem ipsum dolor sit amet consectetuer adipiscing","Department":"Computers","Website":"issuu.com","Latitude":14.6688068,"Longitude":121.1138058,"ShipDate":"5/20/2016","PaymentDate":"2017-03-14 05:05:26","TimeZone":"Asia/Manila","TotalPayment":"$201601.94","Status":2,"Type":1,"Actions":null},\n' +
            '{"RecordID":87,"OrderID":"0268-1481","Country":"Palestinian Territory","ShipCountry":"PS","ShipCity":"‘Aşīrah al Qiblīyah","ShipName":"Morissette Inc","ShipAddress":"4339 Armistice Circle","CompanyEmail":"cgresley2e@wsj.com","CompanyAgent":"Cherlyn Gresley","CompanyName":"Langosh, Kris and Ernser","Currency":"ILS","Notes":"sed vestibulum sit amet cursus id turpis integer aliquet massa id lobortis convallis tortor risus dapibus augue vel","Department":"Jewelery","Website":"google.co.uk","Latitude":"32.17842","Longitude":"35.21569","ShipDate":"4/2/2016","PaymentDate":"2017-01-21 06:18:17","TimeZone":"Asia/Hebron","TotalPayment":"$435115.69","Status":3,"Type":3,"Actions":null},\n' +
            '{"RecordID":100,"OrderID":"50865-056","Country":"Honduras","ShipCountry":"HN","ShipCity":"Yuscarán","ShipName":"Anderson, Pfannerstill and Miller","ShipAddress":"116 Bay Way","CompanyEmail":"hensley2r@businessweek.com","CompanyAgent":"Hamil Ensley","CompanyName":"Kessler, Greenfelder and Gaylord","Currency":"HNL","Notes":"nulla ac enim in tempor turpis nec euismod scelerisque quam turpis adipiscing lorem vitae mattis","Department":"Kids","Website":"dell.com","Latitude":13.9448964,"Longitude":-86.8508942,"ShipDate":"1/14/2016","PaymentDate":"2016-12-27 22:25:10","TimeZone":"America/Tegucigalpa","TotalPayment":"$386091.31","Status":6,"Type":3,"Actions":null}]');



        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'local',
                source: dataJSONArray,
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: [{
                field: 'RecordID',
                title: '#',
                sortable: false,
                width: 20,
                type: 'number',
                selector: {
                    class: ''
                },
                textAlign: 'center',
            }, {
                field: 'OrderID',
                title: 'Order ID',
            }, {
                field: 'Country',
                title: 'Country',
                template: function(row) {
                    return row.Country + ' ' + row.ShipCountry;
                },
            }, {
                field: 'ShipDate',
                title: 'Ship Date',
                type: 'date',
                format: 'MM/DD/YYYY',
            }, {
                field: 'CompanyName',
                title: 'Company Name',
            }, {
                field: 'Status',
                title: 'Status',
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Pending',
                            'class': ' label-light-success'
                        },
                        2: {
                            'title': 'Delivered',
                            'class': ' label-light-danger'
                        },
                        3: {
                            'title': 'Canceled',
                            'class': ' label-light-primary'
                        },
                        4: {
                            'title': 'Success',
                            'class': ' label-light-success'
                        },
                        5: {
                            'title': 'Info',
                            'class': ' label-light-info'
                        },
                        6: {
                            'title': 'Danger',
                            'class': ' label-light-danger'
                        },
                        7: {
                            'title': 'Warning',
                            'class': ' label-light-warning'
                        },
                    };
                    return '<span class="label font-weight-bold label-lg ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
                },
            }, {
                field: 'Type',
                title: 'Type',
                autoHide: false,
                // callback function support for column rendering
                template: function(row) {
                    var status = {
                        1: {
                            'title': 'Online',
                            'state': 'danger'
                        },
                        2: {
                            'title': 'Retail',
                            'state': 'primary'
                        },
                        3: {
                            'title': 'Direct',
                            'state': 'success'
                        },
                    };
                    return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Type].state + '">' +
                        status[row.Type].title + '</span>';
                },
            }],
        });

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // Public functions
        init: function() {
            // init dmeo
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableDataLocalDemo.init();
});
