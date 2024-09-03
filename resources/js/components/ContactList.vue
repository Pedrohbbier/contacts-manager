<template>
  <div class="list-container mt-5">
    <table class="table">
      <thead>
        <tr class="table-primary">
          <th>Nome</th>
          <th>Data de nascimento</th>
          <th>E-mail</th>
          <th>Celular para contato</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="contact in contacts" :key="contact.id">
          <td>{{ contact.name }}</td>
          <td>{{ contact.birthdate }}</td>
          <td>{{ contact.email }}</td>
          <td>{{ contact.phone }}</td>
          <td class="text-center">
            <button class="btn btn-link p-0" @click="openEditModal(contact)">
              <img src="/public/editar.png" alt="Editar" />
            </button>
            <button class="btn btn-link p-0 ms-2" @click="confirmDeleteContact(contact.id)">
              <img src="/public/excluir.png" alt="Excluir" />
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <contact-edit-modal 
      v-if="isEditModalOpen" 
      :contact="selectedContact" 
      @close-modal="closeEditModal"
      @contact-updated="refreshContacts">
    </contact-edit-modal>
  </div>
</template>

<contact-form @contact-saved="refreshContacts"></contact-form>


<script>
import ContactEditModal from './ContactEditModal.vue';
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  components: {
    ContactEditModal,
  },
  data() {
    return {
      contacts: [],
      isEditModalOpen: false,
      selectedContact: null,
    };
  },
  mounted() {
    this.fetchContacts();
  },
  methods: {
    async fetchContacts() {
      try {
        const response = await axios.get('/contacts');
        this.contacts = response.data;
      } catch (error) {
        console.error('Erro ao buscar contatos:', error);
        this.showErrorAlert('Erro ao buscar contatos.');
      }
    },
    openEditModal(contact) {
      this.selectedContact = contact;
      this.isEditModalOpen = true;
      this.$nextTick(() => {
        const modalElement = document.getElementById('editModal');
        const modalInstance = new bootstrap.Modal(modalElement);
        modalInstance.show();
      });
    },
    closeEditModal() {
      this.isEditModalOpen = false;
    },
    confirmDeleteContact(id) {
      Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#068ED1',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!',
        cancelButtonText: 'Cancelar'
      }).then(async (result) => {
        if (result.isConfirmed) {
          await this.deleteContact(id);
        }
      });
    },
    async deleteContact(id) {
      try {
        await axios.delete(`/contacts/${id}`);
        this.refreshContacts();
        this.showSuccessAlert('Contato excluído com sucesso!');
      } catch (error) {
        console.error('Erro ao excluir contato:', error);
        this.showErrorAlert('Erro ao excluir o contato.');
      }
    },
    refreshContacts() {
      this.fetchContacts();
    },
    showSuccessAlert(message) {
      Swal.fire({
        icon: 'success',
        title: 'Sucesso!',
        text: message,
        timer: 2000,
        showConfirmButton: false,
      });
    },
    showErrorAlert(message) {
      Swal.fire({
        icon: 'error',
        title: 'Erro!',
        text: message,
        timer: 2000,
        showConfirmButton: false,
      });
    },
  },
};
</script>

<style scoped>
.list-container {
  margin-top: 20px;
}

.table {
  background-color: white;
}

.table-primary {
  background-color: #068ED1 !important;
  color: white;
}

.table-bordered th, .table-bordered td {
  border: none;
}

.table-striped tbody tr {
  border-bottom: 1px solid #ddd;
}

.table-striped tbody tr:last-child {
  border-bottom: none;
}

.table img {
  width: 20px;
  height: 20px;
}

.table-primary th {
  background-color: #068ED1 !important;
  color: white !important;
}
</style>
