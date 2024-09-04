<template>
    <div class="min-h-screen bg-gray-100 p-10">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-semibold mb-4">User List</h1>

            <table class="min-w-full bg-white">
                <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-200">ID</th>
                    <th class="py-2 px-4 bg-gray-200">Name</th>
                    <th class="py-2 px-4 bg-gray-200">Email</th>
                    <th class="py-2 px-4 bg-gray-200">Created At</th>
                    <th class="py-2 px-4 bg-gray-200">Updated At</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="user in users" :key="user.id" class="border-t">
                    <td class="py-2 px-4">{{ user.id }}</td>
                    <td class="py-2 px-4">{{ user.name }}</td>
                    <td class="py-2 px-4">{{ user.email }}</td>
                    <td class="py-2 px-4">{{ formatDate(user.created_at) }}</td>
                    <td class="py-2 px-4">{{ formatDate(user.updated_at) }}</td>
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

th, td {
    text-align: left;
}

th {
    font-weight: 600;
}

tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}
</style>
