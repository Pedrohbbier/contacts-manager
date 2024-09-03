<template>
  <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);" aria-modal="true" role="dialog" @click.self="closeModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Contato</h5>
          <button type="button" class="btn-close btn-close-white" @click.self="closeModal"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <label for="name" class="form-label">Nome completo</label>
              <input type="text" v-model="form.name" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="birthdate" class="form-label">Data de nascimento</label>
              <input type="date" v-model="form.birthdate" class="form-control" id="birthdate">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" v-model="form.email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="profession" class="form-label">Profissão</label>
              <input type="text" v-model="form.profession" class="form-control" id="profession">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Telefone para contato</label>
              <input type="text" v-model="form.phone" class="form-control" id="phone">
            </div>
            <div class="mb-3">
              <label for="telephone" class="form-label">Celular para contato</label>
              <input type="text" v-model="form.telephone" class="form-control" id="telephone">
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" v-model="form.whatsapp" id="whatsapp">
              <label class="form-check-label" for="whatsapp">Número de celular possui Whatsapp</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" v-model="form.send_sms" id="send_sms">
              <label class="form-check-label" for="send_sms">Enviar notificações por SMS</label>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" v-model="form.send_email" id="send_email">
              <label class="form-check-label" for="send_email">Enviar notificações por E-mail</label>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary text-white">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  props: {
    contact: Object,
  },
  data() {
    return {
      form: {
        id: this.contact.id || null,
        name: this.contact.name || '',
        birthdate: this.contact.birthdate || '',
        email: this.contact.email || '',
        profession: this.contact.profession || '',
        phone: this.contact.phone || '',
        telephone: this.contact.telephone || '',
        whatsapp: this.contact.whatsapp ? true : false,
        send_sms: this.contact.send_sms ? true : false,
        send_email: this.contact.send_email ? true : false,
      },
    };
  },
  methods: {
    async submitForm() {
      try {
        await axios.put(`/contacts/${this.form.id}`, this.form);
        this.$emit('contact-updated');
        this.showSuccessAlert('Contato atualizado com sucesso!');
        this.closeModal();
      } catch (error) {
        console.error('Erro ao atualizar contato:', error);
        this.showErrorAlert('Erro ao atualizar o contato.');
      }
    },
    closeModal() {
      this.$emit('close-modal');
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
.modal-content {
  background-color: white;
}
.modal-header {
  background-color: #068ED1;
  color: white;
}
.modal-body {
  padding: 20px;
}
.form-label {
  color: #068ED1;
  font-weight: bold;
}
.form-control {
  border: none;
  border-bottom: 2px solid #068ED1;
  border-radius: 0;
}
.btn-primary {
  background-color: #068ED1;
  border-color: #068ED1;
}
.btn-primary:hover {
  background-color: #055a9e;
  border-color: #055a9e;
}
</style>
