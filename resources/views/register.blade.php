@extends('layouts.app')

@section('title', 'Inscreva-se')

@section('content')

    @include('partials.painel')

    <section class="wrapper mb-10">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-xxl-10 mx-auto mt-n20">
                    <div class="card">
                        <div class="card-body p-11">
                            <h2 class="mb-3 text-start">Inscreva-se</h2>

                            <div id="formErrors" class="alert alert-danger d-none"></div>

                            <form id="multiStepForm">
                                @csrf

                                <!-- Etapa 1 -->
                                <div class="step active" id="step1">
                                    <p class="lead mb-6 text-start">1. Dados Pessoais</p>
                                    <div class="row mb-2">
                                        <div class="col-lg-5">
                                            <label for="name" class="form-label">Nome:</label>
                                            <input class="form-control" id="name" placeholder="Nome" required>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="id_type_gender" class="form-label">Gênero:</label>
                                            <select class="form-select" id="id_type_gender" required>
                                                <option value="">Carregando...</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="whatsapp" class="form-label">Whatsapp:</label>
                                            <input class="form-control" type="text" id="whatsapp" placeholder="WhatsApp"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <label for="cpf" class="form-label">CPF:</label>
                                            <input class="form-control" type="text" id="cpf" name="cpf"
                                                placeholder="CPF" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="dt_nascimento" class="form-label">Nascimento:</label>
                                            <input class="form-control" type="date" id="dt_nascimento" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-3">
                                            <label for="id_type_group" class="form-label">Grupo:</label>
                                            <select class="form-select" id="id_type_group" required>
                                                <option value="">Carregando...</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3" id="eklesia-wrapper" style="display: none;">
                                            <label for="eklesia" class="form-label">Eklesia:</label>
                                            <input class="form-control" type="text" id="eklesia" placeholder="Eklesia">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-orange w-100 mb-2"
                                        onclick="nextStep(1)">Próximo</button>
                                </div>

                                <!-- Etapa 2 -->
                                <div class="step" id="step2">
                                    <p class="lead mb-6 text-start">2. Criar Usuário</p>
                                    <div class="row mb-2">
                                        <div class="col-lg-8">
                                            <label for="email_user" class="form-label">E-mail:</label>
                                            <input class="form-control" type="email" id="email_user" name="email_user"
                                                placeholder="E-mail" required>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="password" class="form-label">Senha:</label>
                                            <input class="form-control" type="password" id="password" placeholder="Senha"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <button class="btn btn-soft-orange w-100 mb-2" type="button"
                                                onclick="prevStep(2)">Voltar</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-orange w-100 mb-2" type="button"
                                                onclick="nextStep(2)">Próximo</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Etapa 3 -->
                                <div class="step" id="step3">
                                    <p class="lead mb-6 text-start">3. Endereço</p>
                                    <div class="row mb-2">
                                        <div class="col-lg-3">
                                            <label for="cep" class="form-label">CEP:</label>
                                            <input class="form-control" type="text" id="cep" placeholder="CEP"
                                                required>
                                        </div>
                                        <div class="col-lg-7">
                                            <label for="logradouro" class="form-label">Endereço:</label>
                                            <input class="form-control" type="text" id="logradouro"
                                                placeholder="Logradouro" required>
                                        </div>
                                        <div class="col-lg-2">
                                            <label for="numero" class="form-label">Número:</label>
                                            <input class="form-control" type="text" id="numero" placeholder="Nº"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4">
                                            <label for="complemento" class="form-label">Complemento:</label>
                                            <input class="form-control" type="text" id="complemento"
                                                placeholder="Complemento">
                                        </div>
                                        <div class="col-lg-8">
                                            <label for="bairro" class="form-label">Bairro:</label>
                                            <input class="form-control" type="text" id="bairro"
                                                placeholder="Bairro" required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-9">
                                            <label for="localidade" class="form-label">Cidade:</label>
                                            <input class="form-control" type="text" id="localidade"
                                                placeholder="Cidade" required>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="uf" class="form-label">UF:</label>
                                            <input class="form-control" type="text" id="uf" placeholder="UF"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-6">
                                            <button class="btn btn-soft-orange w-100 mb-2" type="button"
                                                onclick="prevStep(3)">Voltar</button>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-orange w-100 mb-2" type="submit">Finalizar
                                                Cadastro</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <p class="mb-1 mt-5 text-center">
                                <a href="/" class="hover text-orange">
                                    <i class="uil uil-corner-up-left-alt"></i> Voltar para Página Principal
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentStep = 1;

        // function nextStep(step) {
        //     document.getElementById("step" + step).classList.remove("active");
        //     document.getElementById("step" + (step + 1)).classList.add("active");
        //     currentStep++;
        // }

        function nextStep(step) {
            const currentStepDiv = document.getElementById("step" + step);
            const requiredFields = currentStepDiv.querySelectorAll("[required]");
            let valid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add("is-invalid");
                    valid = false;
                } else {
                    field.classList.remove("is-invalid");
                }
            });

            if (!valid) {
                showErrors({
                    geral: ["Preencha todos os campos obrigatórios antes de continuar."]
                });
                return;
            }

            document.getElementById("formErrors").classList.add("d-none");
            currentStepDiv.classList.remove("active");
            document.getElementById("step" + (step + 1)).classList.add("active");
            currentStep++;
        }


        function prevStep(step) {
            document.getElementById("step" + step).classList.remove("active");
            document.getElementById("step" + (step - 1)).classList.add("active");
            currentStep--;
        }
    </script>

    <script>
        document.getElementById("multiStepForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            const idGroup = document.getElementById("id_type_group").value;
            const eklesia = document.getElementById("eklesia").value.trim();
            const cpf = document.getElementById("cpf").value.replace(/\D/g, '');
            const email = document.getElementById("email_user").value.trim();
            const password = document.getElementById("password").value.trim();

            let formValid = true;
            const errors = {};

            // CPF duplicado
            const resCpf = await fetch("/check-cpf", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute(
                        "content")
                },
                body: JSON.stringify({
                    cpf
                })
            }).then(res => res.json());

            if (resCpf.status && resCpf.result?.data?.length > 0) {
                errors.cpf = ["CPF já está cadastrado."];
                formValid = false;
            }

            // E-mail duplicado
            const resEmail = await fetch("/check-email", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute(
                        "content")
                },
                body: JSON.stringify({
                    email
                })
            }).then(res => res.json());

            if (resEmail.status && resEmail.result?.data?.length > 0) {
                errors.email = ["E-mail já está cadastrado."];
                formValid = false;
            }

            // Eklesia duplicado (somente se grupo = 1)
            if (idGroup === "1" && eklesia !== "") {
                const resEklesia = await fetch("/check-eklesia", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]')
                            .getAttribute("content")
                    },
                    body: JSON.stringify({
                        eklesia
                    })
                }).then(res => res.json());

                if (resEklesia.result?.data?.length > 0) {
                    errors.eklesia = ["Este código Eklesia já está cadastrado."];
                    formValid = false;
                }
            }

            // Senha curta
            if (password.length < 6) {
                errors.password = ["A senha deve ter no mínimo 6 caracteres."];
                formValid = false;
            }

            if (!formValid) {
                showErrors(errors);
                return;
            }

            // Preparar dados e enviar
            const jsonData = {
                name: document.getElementById("name").value,
                cpf,
                id_type_gender: document.getElementById("id_type_gender").value,
                id_type_group: idGroup,
                birthdate: document.getElementById("dt_nascimento").value,
                whatsapp: document.getElementById("whatsapp").value,
                eklesia: eklesia,
                email,
                password,
                address: {
                    cep: document.getElementById("cep").value,
                    logradouro: document.getElementById("logradouro").value,
                    numero: document.getElementById("numero").value,
                    complemento: document.getElementById("complemento").value,
                    bairro: document.getElementById("bairro").value,
                    localidade: document.getElementById("localidade").value,
                    uf: document.getElementById("uf").value
                }
            };

            fetch("/cadastro/salvar", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').getAttribute(
                            "content")
                    },
                    body: JSON.stringify(jsonData)
                })
                .then(res => res.json())
                .then(data => {
                    if (data.error && data.messages) {
                        showErrors(data.messages);
                    } else if (data.error && data.message) {
                        showErrors({
                            geral: [data.message]
                        });
                    } else if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        alert("Cadastro realizado com sucesso!");
                        document.getElementById("multiStepForm").reset();
                    }
                })
                .catch(err => {
                    console.error("Erro:", err);
                    alert("Erro ao enviar os dados.");
                });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cepInput = document.getElementById("cep");

            cepInput.addEventListener("blur", function() {
                const cep = cepInput.value.replace(/\D/g, '');

                if (cep.length !== 8) {
                    alert("CEP inválido!");
                    return;
                }

                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(res => res.json())
                    .then(data => {
                        if (data.erro) {
                            alert("CEP não encontrado!");
                            return;
                        }

                        document.getElementById("logradouro").value = data.logradouro || '';
                        document.getElementById("bairro").value = data.bairro || '';
                        document.getElementById("localidade").value = data.localidade || '';
                        document.getElementById("uf").value = data.uf || '';
                    })
                    .catch(() => {
                        alert("Erro ao buscar o CEP.");
                    });
            });
        });
    </script>

    @php
        $apiUrl = config('api.url');
        $userName = config('api.username');
        $token = config('api.token');
    @endphp

    {{-- {{ dd($apiUrl) }} --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectTypeGender = document.getElementById("id_type_gender");

            fetch("/proxy/type-gender")
                .then(res => res.json())
                .then(data => {

                    console.log("Gêneros recebidos:", data);

                    selectTypeGender.innerHTML = '<option value="">Selecione o Gênero</option>';

                    if (data && data.type_genders && data.type_genders.data) {
                        data.type_genders.data.forEach(g => {
                            selectTypeGender.innerHTML += `<option value="${g.id}">${g.name}</option>`;
                        });
                    } else {
                        selectTypeGender.innerHTML = '<option value="">Nenhum gênero encontrado</option>';
                    }
                })
                .catch(() => {
                    selectTypeGender.innerHTML = '<option value="">Erro ao carregar gêneros</option>';
                });
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectTypeGroup = document.getElementById("id_type_group");

            fetch("/proxy/type-group")
                .then(res => res.json())
                .then(data => {
                    selectTypeGroup.innerHTML = '<option value="">Selecione o Grupo</option>';

                    if (data && data.type_groups && data.type_groups.data) {
                        data.type_groups.data.forEach(g => {
                            selectTypeGroup.innerHTML += `<option value="${g.id}">${g.name}</option>`;
                        });
                    } else {
                        selectTypeGroup.innerHTML = '<option value="">Nenhum grupo encontrado</option>';
                    }
                })
                .catch(() => {
                    selectTypeGroup.innerHTML = '<option value="">Erro ao carregar grupos</option>';
                });
        });
    </script>

    <script>
        function showErrors(errors) {
            const errorBox = document.getElementById("formErrors");
            errorBox.classList.remove("d-none");

            const messages = {
                "The cpf has already been taken.": "CPF já está cadastrado.",
                "The email has already been taken.": "E-mail já está cadastrado."
            };

            errorBox.innerHTML = Object.entries(errors)
                .map(([field, msgs]) => {
                    const translated = msgs.map(msg => messages[msg] || msg);
                    return `<div><strong>${field}:</strong> ${translated.join(', ')}</div>`;
                })
                .join('');
        }
    </script>

    <script>
        document.getElementById('id_type_group').addEventListener('change', function() {
            const eklesiaField = document.getElementById('eklesia-wrapper');
            const selectedValue = this.value;

            if (selectedValue === '1') {
                eklesiaField.style.display = 'block';
            } else {
                eklesiaField.style.display = 'none';
            }
        });
    </script>


    <script>
        // ✅ Validação CPF no blur
        document.getElementById("cpf").addEventListener("blur", function() {
            const cpf = this.value.replace(/\D/g, '');
            if (cpf.length < 11) return;

            fetch("/check-cpf", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            "content")
                    },
                    body: JSON.stringify({
                        cpf
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status && data.result?.data?.length > 0) {
                        showErrors({
                            cpf: ["CPF já está cadastrado."]
                        });
                        this.classList.add("is-invalid");
                    } else {
                        this.classList.remove("is-invalid");
                        document.getElementById("formErrors").classList.add("d-none");
                    }
                });
        });

        // ✅ Validação E-mail no blur
        document.getElementById("email_user").addEventListener("blur", function() {
            const email = this.value.trim();
            if (email.length < 5) return;

            fetch("/check-email", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            "content")
                    },
                    body: JSON.stringify({
                        email
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status && data.result?.data?.length > 0) {
                        showErrors({
                            email: ["E-mail já está cadastrado."]
                        });
                        this.classList.add("is-invalid");
                    } else {
                        this.classList.remove("is-invalid");
                        document.getElementById("formErrors").classList.add("d-none");
                    }
                });
        });

        // ✅ Validação Eklesia no blur (se grupo = 1)
        document.getElementById("eklesia").addEventListener("blur", function() {
            const eklesia = this.value.trim();
            const idGroup = document.getElementById("id_type_group").value;
            if (idGroup !== "1" || !eklesia) return;

            fetch("/check-eklesia", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            "content")
                    },
                    body: JSON.stringify({
                        eklesia
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.result?.data?.length > 0) {
                        showErrors({
                            eklesia: ["Este código Eklesia já está cadastrado."]
                        });
                        this.classList.add("is-invalid");
                    } else {
                        this.classList.remove("is-invalid");
                        document.getElementById("formErrors").classList.add("d-none");
                    }
                });
        });

        // ✅ Validação de senha no blur
        document.getElementById("password").addEventListener("blur", function() {
            const password = this.value.trim();
            if (password.length < 6) {
                showErrors({
                    password: ["A senha deve ter no mínimo 6 caracteres."]
                });
                this.classList.add("is-invalid");
            } else {
                this.classList.remove("is-invalid");
                document.getElementById("formErrors").classList.add("d-none");
            }
        });
    </script>



    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
        }
    </style>

@endsection
