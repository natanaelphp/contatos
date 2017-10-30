<!DOCTYPE html>
<html>
    <head>
        <?php require View('template/head') ?>
    </head>
    <body>
        <div class="container">

            <?php include View('contact/partial/backButton') ?>
            <?php include View('partial/errorMessage') ?>

            <form action="" method="POST">

                <div class="field">
                    <label class="label">Name</label>
                    <input class="input" type="text" name="name" value="<?=old('name', $contact->name)?>">
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <input class="input" type="email" name="email" value="<?=old('email', $contact->email)?>">
                </div>

                <div class="field">
                    <label class="label">Adress</label>
                    <input class="input" type="adress" name="adress" value="<?=old('adress', $contact->adress)?>">
                </div>

                <br>
                <div id="vue" class="card card-content">
                    <label class="label">Phones</label>
                    <template v-for="phone in phones">
                        <div class="field has-addons">
                            <div class="control">
                                <input
                                    class="input"
                                    type="phone"
                                    name="phones[]"
                                    v-model="phone.number"
                                >
                            </div>
                            <div class="control">
                                <a class="button is-danger" v-on:click.prevent="removePhone(phone)">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </template>
                    <button class="button is-success" v-on:click.prevent="addPhone">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        &nbsp; Add phone
                    </button>
                </div>

                <br>
                <div class="field">
                    <input type="submit" value="Update contact" class="button is-warning is-fullwidth">
                </div>

            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue" charset="utf-8"></script>
        <script type="text/javascript">
            new Vue({
                el: '#vue',
                data: {
                    phones: <?=json_encode(old('phones', $phones))?>,
                },
                methods: {
                    addPhone () {
                        this.phones.push({ number: '' })
                    },
                    removePhone (phone) {
                        let index = this.phones.indexOf(phone)
                        this.phones.splice(index, 1)
                    }
                }
            })
        </script>
    </body>
</html>
