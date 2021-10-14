<template>

    <div>

        <h1>Vue Router</h1>

        <p>

            <router-link :to="{ name: 'home' }">Home</router-link> |

            <router-link :to="{ name: 'test' }">Test</router-link>

        </p>

        <div class="container">

            <router-view></router-view>

        </div>

    </div>

</template>

<script>

    export default {}

</script>