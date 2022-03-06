<template>
    <form>
        <div class="modal-body">
            <div class="form-group">
                <input v-model="form.name" type="text" name="name" placeholder="إسم الدور"
                    class="form-control" :class="{'is-invaild': form.errors.has('name')}">
                <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />

            </div>

            <b-form-group label="تحديد صلاحيات">
                <b-form-checkbox
                    v-for="option in permissions"
                    v-model="form.permissions"
                    :key="option.name"
                    :value="option.name"
                    name="name"
                >
                    {{ option.name }}
                </b-form-checkbox>
            </b-form-group>


        </div>
        <div class="modal-footer justify-content-between">
            <b-button type="submit" variant="primary" class="btn-lg btn-primary" v-if="!dis" disabled><b-spinner small type="grow"></b-spinner>إنشاء دور</b-button>
            <button type="submit"  v-if="dis" @click.prevent="createRole()" class="btn btn-lg btn-primary"><i class="fa-solid fa-floppy-disk"></i> حفظ الدور</button>
        </div>
    </form>
</template>

<script>

export default {
    data(){
        return{
            dis: true,
            permissions: [],
            form: new Form({
                'name' : '',
                'permissions' : []
            }) 
        }
    },
    methods:{
        getPermissions(){
            axios.get("/getAllPermission")
            .then((response)=>{
                this.permissions = response.data.permissions
            }).catch(()=>{
                Swal.fire({
                    icon: 'error',
                    title: 'انتبه...',
                    text: 'هناك شيء خاطئ!',
                })
            });
        },
        createRole(){
            this.dis = false;
            this.form.post("/postRole").then(()=>{
                swal.fire({
                    icon: 'success',
                    title: 'نجحت العملية',
                    text: 'تم إنشاء الدور بنجاح',
                })
                window.location = "/admin/role";
            }).catch(()=>{
                swal.fire({
                    icon: 'error',
                    title: 'انتبه...',
                    text: 'هناك شيء خاطئ!',
                });
            });
            this.dis=true;
        }
    },
    created(){
        this.getPermissions();
    }
}

</script>