<template>
  <div class="d-flex flex-column min-vh-100">
    <header class="bg-primary text-white py-3 d-flex align-items-center">
      <img src="/public/logo_alphacode.png" alt="Alphacode Logo" class="me-3" style="height: 80px;">
      <h1 class="fs-3 fw-bold">Cadastro de contatos</h1>
    </header>

    <div class="container mt-4 flex-grow-1">
      <contact-form @contact-saved="fetchContacts"></contact-form>
      <contact-list @edit-contact="openEditModal" :contacts="contacts" @contact-updated="fetchContacts"></contact-list>
    </div>

    <contact-edit-modal v-if="editingContact" :contact="editingContact" @contact-updated="handleContactUpdated"></contact-edit-modal>

    <footer class="bg-primary text-white text-center py-4 mt-auto">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <p class="mb-0"><a href="#" class="text-white text-decoration-none">Termos</a> | <a href="#" class="text-white text-decoration-none">Políticas</a></p>
          </div>
          <div class="col-md-4">
            <p class="mb-0">© Copyright 2022 | Desenvolvido por <img src="/public/logo_rodape_alphacode.png" alt="Alphacode Logo" class="img-fluid" style="height: 24px;"></p>
          </div>
          <div class="col-md-4">
            <p class="mb-0">© Alphacode IT Solutions 2022</p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import ContactForm from './components/ContactForm.vue';
import ContactList from './components/ContactList.vue';
import ContactEditModal from './components/ContactEditModal.vue';
import axios from 'axios';

export default {
  components: {
    ContactForm,
    ContactList,
    ContactEditModal,
  },
  data() {
    return {
      contacts: [],
      editingContact: null,
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
      }
    },
    openEditModal(contact) {
      this.editingContact = contact;
    },
    handleContactUpdated() {
      this.editingContact = null;
      this.fetchContacts();
    },
  },
};
</script>
