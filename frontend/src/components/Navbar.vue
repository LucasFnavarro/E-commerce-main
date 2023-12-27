<script setup>
import { ref } from 'vue';
import icons from "../data/icons.json";
import user from "../assets/icons/user.png"
import bag from "../assets/icons/bolsa.png"
import fav from "../assets/icons/fav.png"
import lupa from "../assets/icons/lupa.png";

const searchInput = ref('');
</script>

<template>
    <header class="w-full flex items-center px-4 py-2">
        <nav class="navbar bg-base-100">
            <div class="navbar-start">
                <a href="#" class="btn btn-ghost text-xl text-slate-900">CodeGenius</a>
            </div>
            <div class="pr-0 navbar-center input input-bordered w-24 md:w-auto">
                <input type="text" class="" placeholder="Search..." />
                <button class="btn btn-ghost btn-square">
                    <img :src="lupa" width="25" alt="lupa">
                </button>
            </div>

            <div class="navbar-end">
                <figure id="bag">
                    <div class="flex-none">
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                <div class="indicator">
                                    <img :src="bag" class="h-7 w-7" />
                                    <span class="badge badge-sm indicator-item">0</span>
                                </div>
                            </div>
                            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                                <div class="card-body">
                                    <span class="font-bold text-lg">0 Items</span>
                                    <span class="text-info">Subtotal: $0</span>
                                    <div class="card-actions">
                                        <button class="btn btn-primary btn-block">View cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
                <figure id="fav">
                    <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                <div class="indicator">
                                    <img :src="fav" class="h-7 w-7" />
                                    <span class="badge badge-sm indicator-item">0</span>
                                </div>
                            </div>
                            <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                                <div class="card-body">
                                    <span class="font-bold text-lg">0 Items</span>
                                    <div class="card-actions">
                                        <button class="btn btn-primary btn-block">See More</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </figure>
                <figure id="user">
                    <div class="flex-none">
                        <div class="dropdown dropdown-end">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar online">
                                <div class="w-7 rounded-full">
                                    <img alt="user" class="w-7 h-7" :src="user" />
                                </div>
                            </div>
                            <ul tabindex="0"
                                class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                                <li>
                                    <a>
                                        Profile
                                    </a>
                                </li>
                                <li><a>Settings</a></li>
                                <li><a>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </figure>
            </div>
        </nav>
    </header>
</template>