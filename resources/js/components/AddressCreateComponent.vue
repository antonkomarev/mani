<template>
    <button class="btn btn-outline-secondary" v-on:click="confirmAddressCreation">
        + Add address
    </button>
</template>

<script>
    export default {
        mounted() {
        },

        methods: {
            confirmAddressCreation: function () {
                Swal({
                    title: 'Are you sure?',
                    text: 'New address will be created',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, create it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/new-address')
                            .then(function (response) {
                                Swal(
                                    'New address created',
                                    `ID: ${response.data.address}`,
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            })
                            .catch(function (error) {
                                console.error(error);
                            });
                    }
                })
            }
        }
    }
</script>
