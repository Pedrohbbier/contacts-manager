<template>
  <div class="form-container">
    <form @submit.prevent="submitForm" class="row g-3">
      <div class="col-md-6">
        <label for="name" class="form-label">Nome completo</label>
        <input type="text" v-model="form.name" class="form-control" id="name" placeholder="Ex.: Letícia Pacheco dos Santos">
      </div>
      <div class="col-md-6">
        <label for="birthdate" class="form-label">Data de nascimento</label>
        <input type="date" v-model="form.birthdate" class="form-control" id="birthdate">
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" v-model="form.email" class="form-control" id="email" placeholder="Ex.: leticia@gmail.com">
      </div>
      <div class="col-md-6">
        <label for="profession" class="form-label">Profissão</label>
        <input type="text" v-model="form.profession" class="form-control" id="profession" placeholder="Ex.: Desenvolvedora Web">
      </div>
      <div class="col-md-6">
        <label for="phone" class="form-label">Telefone para contato</label>
        <input type="text" v-model="form.phone" class="form-control" id="phone" placeholder="Ex.: (11) 4033-2019">
      </div>
      <div class="col-md-6">
        <label for="telephone" class="form-label">Celular para contato</label>
        <input type="text" v-model="form.telephone" class="form-control" id="telephone" placeholder="Ex.: (11) 98493-2039">
      </div>
      <div class="col-md-6 d-flex flex-column">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" v-model="form.whatsapp" id="whatsapp">
          <label class="form-check-label" for="whatsapp">Número de celular possui Whatsapp</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" v-model="form.send_sms" id="send_sms">
          <label class="form-check-label" for="send_sms">Enviar notificações por SMS</label>
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" v-model="form.send_email" id="send_email">
          <label class="form-check-label" for="send_email">Enviar notificações por E-mail</label>
        </div>
      </div>
      <div class="col-12 text-end">
        <button type="submit" class="btn btn-primary text-white">Cadastrar contato</button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default {
  data() {
    return {
      form: {
        name: '',
        birthdate: '',
        email: '',
        profession: '',
        phone: '',
        telephone: '',
        whatsapp: false,
        send_sms: false,
        send_email: false,
      }
    }
  },
  methods: {
    async submitForm() {
      try {
        await axios.post('/contacts', this.form);
        Swal.fire({
          icon: 'success',
          title: 'Sucesso!',
          text: 'Contato cadastrado com sucesso!',
          timer: 2000,
          showConfirmButton: false,
        });
        this.resetForm();
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      } catch (error) {
        console.error('Erro ao salvar contato:', error);
        Swal.fire({
          icon: 'error',
          title: 'Erro!',
          text: 'Erro ao salvar contato.',
          timer: 2000,
          showConfirmButton: false,
        });
      }
    },
    resetForm() {
      this.form = {
        name: '',
        birthdate: '',
        email: '',
        profession: '',
        phone: '',
        telephone: '',
        whatsapp: false,
        send_sms: false,
        send_email: false,
      };
    }
  }
}
</script>

<style scoped>
.form-container {
  padding: 20px;
  margin-top: 20px;
  background-color: white;
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

.form-check-input {
  border-color: #068ED1;
}

.form-check-label {
  margin-left: 5px;
  font-weight: bold;
  color: #333;
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
