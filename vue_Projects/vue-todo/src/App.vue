<template>
  <header>
    <div class="wrapper">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <router-link class="navbar-brand" to="/">Todo List</router-link>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" to="/about">About Us</router-link>
              </li>
              <li class="nav-item">
                <router-link class="nav-link active" aria-current="page" to="/todo">TODO</router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />
</template>
