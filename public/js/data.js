var controller = new Vue({
    el: '#controller',
    data: {
        datas: [],
        editStatus: false,
        data: {},
        actionUrl: actionUrl,
    },
    mounted: function(){
        this.datatable();
    },
    methods: {
        datatable() {
            const _this = this
            _this.table = $('#datatable').DataTable({
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                ajax: {
                    url: _this.actionUrl,
                    type: 'get',
                },
                columns: columns
            }).on('xhr', function () {
                _this.datas = _this.table.ajax.json().data;
            });
        },
        addData() {
            this.editStatus = false;
            this.data = {};
            $('#modal-default').modal();
        },
        editData(event, index) {
            this.editStatus = true;
            this.data = this.datas[index];
            $('#modal-default').modal();
        },
        deleteData(event, id) {
            if(confirm('Are you sure ?')){
                $(event.target).parents('tr').remove();
                axios.post(this.actionUrl + '/' + id, {_method: 'DELETE'}).then(response => {
                    alert('data has been removed');
                });
            }
        },
        submitForm(event, id) {
            event.preventDefault();
            const _this = this;
            var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl+'/'+id
            axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                $('#modal-default').modal('hide')
                _this.table.ajax.reload();
            });
        },
    }
});