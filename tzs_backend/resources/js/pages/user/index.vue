<template lang="">
    <div>
        <v-row>
            <v-col>
                <v-data-table :headers="userheader" :items="users" class="elevation-1" :items-per-page="1000">
                    <template v-slot:top>
                        <v-toolbar flat color="white">
                            <v-toolbar-title>Manage Users</v-toolbar-title>
                            <v-divider class="mx-4" inset vertical />
                            <div class="flex-grow-1" />
                            <button class="btn btn-primary mr-2" type="button" @click="showUserModal">Add new</button>
                        </v-toolbar>
                    </template>
                    <template v-slot:item.action="{ item }">
                        <v-icon small class="mr-2" @click="showEditUserModal(item)"> edit </v-icon>
                        <v-icon small @click="deleteUser(item, users)"> delete </v-icon>
                    </template>

                    <template v-slot:body="{ items }">
                        <tbody>
                            <tr v-for="item in items" :key="item.id">
                                <td>{{ item.name }}</td>
                                <td>
                                    {{ item.email }}
                                </td>
                                <td>
                                    {{ showNormalRole(item.role) }}
                                </td>
                                <td>
                                    <v-icon small class="mr-2" @click="showEditUserModal(item)"> edit </v-icon>
                                    <v-icon small @click="deleteUser(item)"> delete </v-icon>
                                </td>
                            </tr>
                        </tbody>
                    </template>
                </v-data-table>
            </v-col>
        </v-row>

        <div v-if="userDialog" max-width="300px" class="dialog">
            <form @submit.prevent="saveUser" @keydown="form.onKeydown($event)">
                <alert-success :form="form" :message="$t('info_updated')" />

                <!-- User neve -->
                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Username') }}</label>
                    <div class="col-md-7">
                        <input
                            v-model="form.name"
                            :class="{ 'is-invalid': form.errors.has('name') }"
                            class="form-control"
                            type="text"
                            name="username"
                        />
                        <has-error :form="form" field="name" />
                    </div>
                </div>
                <!-- Email -->
                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Email') }}</label>
                    <div class="col-md-7">
                        <input
                            v-model="form.email"
                            :class="{ 'is-invalid': form.errors.has('email') }"
                            class="form-control"
                            type="text"
                            name="email"
                        />
                        <has-error :form="form" field="email" />
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Password') }}</label>
                    <div class="col-md-7">
                        <input
                            v-model="form.password"
                            :class="{ 'is-invalid': form.errors.has('password') }"
                            class="form-control"
                            type="password"
                            name="password"
                        />
                        <has-error :form="form" field="password" />
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Role') }}</label>
                    <div class="col-md-7">
                        <select class="form-control" v-model="form.role" id="role">
                            <option v-for="role in userRoles" :value="role.id">{{ role.text }}</option>
                        </select>
                        <has-error :form="form" field="role" />
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-md-9 ms-md-auto">
                        <button class="btn btn-secondary mr-2" type="button" @click="closeDialog">
                            {{ $t('Mégse') }}
                        </button>
                        <v-button :loading="form.busy" type="primary">
                            {{ $t('Mentés') }}
                        </v-button>
                    </div>
                </div>
            </form>
        </div>

        <div v-if="editDialog" max-width="300px" class="dialog">
            <form @submit.prevent="editUser">
                <alert-success :form="selectedUser" :message="$t('info_updated')" />
                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Username') }}</label>
                    <div class="col-md-7">
                        <input v-model="selectedUser.name" class="form-control" type="text" name="name" />
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Belépés dátuma') }}</label>
                    <div class="col-md-7">
                        <input v-model="selectedUser.email" class="form-control" type="text" name="email" />
                    </div>
                </div>

                <div class="row">
                    <label class="col-md-3 col-form-label text-md-end">{{ $t('Belépés dátuma') }}</label>
                    <div class="col-md-7">
                        <select class="form-control" v-model="selectedUser.role" id="role">
                            <option v-for="role in userRoles" :value="role.id">{{ role.text }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-3"></div>
                    <div class="col-md-7">
                        <button class="btn btn-secondary mr-2" type="button" @click="closeEditDialog">
                            {{ $t('Mégse') }}
                        </button>
                        <button class="btn btn-primary" type="submit">{{ $t('Mentés') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import 'vue-loading-overlay/dist/vue-loading.css'
import Form from 'vform'
export default {
    middleware: 'auth',

    data() {
        return {
            form: new Form({
                name: '',
                email: '',
                password: '',
                role: '',
            }),
            users: [],
            userheader: [
                { text: 'Name', value: 'name' },
                { text: 'E-mail', value: 'email' },
                { text: 'Role', value: 'role' },
                { text: 'Actions', value: 'action', sortable: false, width: '30px' },
            ],
            userRoles: [
                { id: 0, text: '' },
                { id: 1, text: 'Admin' },
                { id: 2, text: 'User' },
            ],
            userDialog: false,
            editDialog: false,
            selectedUser: {},
        }
    },
    mounted() {
        this.initialize()
    },
    computed: {},
    methods: {
        initialize() {
            document.body.classList.remove('blurOverlay')
            axios.get('/api/getAllUser').then((response) => {
                this.users = response.data
            })
        },
        showUserModal() {
            this.userDialog = true
            document.body.classList.add('blurOverlay')
        },
        closeDialog() {
            this.userDialog = false
            document.body.classList.remove('blurOverlay')
        },
        showEditUserModal(user) {
            this.editDialog = true
            this.selectedUser = user
            document.body.classList.add('blurOverlay')
        },
        closeEditDialog() {
            this.editDialog = false
            this.selectedUser = {}
            document.body.classList.remove('blurOverlay')
        },
        async saveUser() {
            for (const key in this.form) {
                if (this.form[key] === '') {
                    alert('Minden mezőt ki kell tölteni!')
                    return
                }
            }
            const { data } = await this.form.post('/api/addUser')
            this.form.reset()
            this.closeDialog()
            this.initialize()
        },
        showNormalRole(item) {
            if (item == 1) {
                return 'Admin'
            } else {
                return 'User'
            }
        },
        async deleteUser(user) {
            if (window.confirm('Biztosan törölni szeretnéd?')) {
                const { data } = await axios.delete(`/api/deleteUser/${user.id}`)
                this.initialize()
            } else {
                return
            }
        },
        async editUser(user) {
            if (user.role == 1) {
                alert('Admin felhasználó nem szerkeszthető!')
                return
            }
            console.log(this.selectedUser, 'selectedUser')
            const { data } = await axios.put('/api/updateUser', this.selectedUser)
            this.closeEditDialog()
            this.initialize()
        },
    },
}
</script>
<style scoped>
.blurOverlay {
    -webkit-filter: blur(8px);
    filter: blur(2px);
}
.dialog {
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 1200px;
    transform: translate(-50%, -50%);
    background-color: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    padding: 20px;
    z-index: 9999;
    /* overflow-y: auto; */
}

.dialog::before {
    content: '';
    position: absolute;
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-bottom-color: white;
}

.dialog::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    border: 10px solid transparent;
    border-top-color: white;
}

@media (max-width: 1225px) {
    .dialog {
        height: -webkit-fill-available;
        min-width: 90%;
        max-width: 90%;
        overflow-x: hidden;
        padding: 10px;
    }

    .dialog::before,
    .dialog::after {
        display: none;
    }
}

@media (max-width: 768px) {
    .dialog {
        height: -webkit-fill-available;
        min-width: 90%;
        max-width: 90%;
        overflow-x: hidden;
        padding: 10px;
    }

    .dialog::before,
    .dialog::after {
        display: none;
    }
}
</style>
