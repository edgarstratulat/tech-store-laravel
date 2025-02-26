<template>
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Password" />
        <button type="submit">Register</button>
    </form>
</template>

<script>
export default {};
</script>
