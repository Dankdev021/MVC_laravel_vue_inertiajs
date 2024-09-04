<template>
    <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 40px;">
        <div style="width: 100%; max-width: 1000px; background-color: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);">
            <h1 style="text-align: center; font-size: 28px; font-weight: 600; color: #333333; margin-bottom: 24px;">Usuários</h1>

            <table style="width: 100%; border-collapse: collapse; background-color: white; border: 1px solid #ddd;">
                <thead>
                    <tr style="background-color: #f7f7f7;">
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">ID</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Nome</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Email</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Criado emt</th>
                        <th style="padding: 12px; border-bottom: 1px solid #ddd;">Atualizado em</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 12px;">{{ user.id }}</td>
                        <td style="padding: 12px;">{{ user.name }}</td>
                        <td style="padding: 12px;">{{ user.email }}</td>
                        <td style="padding: 12px;">{{ formatDate(user.created_at) }}</td>
                        <td style="padding: 12px;">{{ formatDate(user.updated_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        users: Array
    },
    methods: {
        formatDate(date) {
            const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
            return new Date(date).toLocaleDateString(undefined, options);
        }
    }
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    font-weight: 600;
    background-color: #f7f7f7;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

tbody tr:hover {
    background-color: #f1f1f1;
}
</style>
