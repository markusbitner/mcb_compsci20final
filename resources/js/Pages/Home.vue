<!-- Home page -->
<template>

    <Head>
        <title>Home</title>
        <meta type="description" content="Home information" head-key="description">
    </Head>

    <h1 class="text-3xl">
        Home
    </h1>

    <p class="grid place-items-center mt-6">
        Welcome to the overly simple app showcasing the raw power of Inertia!
        This site has little features, including log-in and authentication, the creation of users, and the display of said users in a neat list. But do not be deceived... this project took me countless hours! Most of it may be exactly the same code as demonstrated in the tutorial, but it was a learning process nonetheless.
        <br><br>
        What did I learn? PHP! Inertia! The Vue framework! Server and client side programing! Databases! Web app development! The Tailwind CSS framework! Git version control! By following along with the tutorial and constructing this website myself, I've been able to see this new language of code in action and understand it more. Even the JavaScript used in this series was entirely new to me. Now, do I completely understand every bit of code that I've written? Not entirely. Much of it is still confusing to me, but I'm learning from it nonetheless.
        <br><br>
        Now, I'll give you a brief description of the site. Like you've already experienced, it is impossible to access the site without properly logging in with the correct email and password. On the users page, you'll find the index of all the existing users with a paginator at the bottom of the page. The search bar is completely functional, and only makes a request after you've stopped typing so as to avoid an excess of processing.
    </p>
    <br>
    <!--Only executive users can see this text-->
    <p v-if="can.createUser" class="text-green-800">
        Since you are logged in as Ms. Cheston, you can see this green text. To another user, it would not exist. Further executive privelidges include the ability to create new users... and nothing else for the present. But if you click on the "new user" link on the users page, the process should be fairly simple. You can then log in as that user, but you will not have the extra priveledges that your own profile has. The executive feature of viewing this green text was created ENTIRELY BY ME, without any reference to the turorial. Ain't science something?
    </p>
    <br>
    <!--Regular viewing-->
    <p>
        You will notice that on the users page, there is an edit button on some, but not all, of the users. If I had more time to develop the site, the edit button would not be placed randomly with each page refresh. The edit button randomly shows up to mimic what it would look like to have different levels of authorization which allows only some users to be edited. Also, the edit button currently does nothing.
    </p>
</template>

<script setup>

let props = defineProps({
    can: Object,
});

</script>
