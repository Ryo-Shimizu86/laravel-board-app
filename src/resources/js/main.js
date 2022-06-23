const app = Vue.createApp({
    methods: {
        deleteConfirm() {
            const result = confirm("本当に削除してよろしいですか");
            if (!result) event.preventDefault();
        },
    },
});

app.mount("#message-update-app");
