Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore

@quint08
Learn Git and GitHub without any code!
Using the Hello World guide, you’ll start a branch, write comments, and open a pull request.


alvarotrigo
/
vue-fullpage.js
598
27
1.3k180
Code Issues 15 Pull requests 3 Actions Projects 0 Wiki Security Insights
vue-fullpage.js/demos/webpack/src/App.vue
@alvarotrigo alvarotrigo - Documentation: added licenseKey
cb46c07 on 6 Jul 2019
Executable File 149 lines (131 sloc) 5.1 KB

<template>
    <div id="app">
        <full-page :options="options" id="fullpage">
            <div class="section" id="section0">
                <div class="pad" onmouseover="showCreate()" onmouseout="hideCreate()">
                    <div class="logo-box">
                        <p id="logo-txt">QF</p>
                    </div>
                    <a href="/home" target="blank_">
                    <div class="link-box">
                        <img :src="'img/user.svg'" alt="pen" class="link-box-img">
                    </div>
                    </a>
                </div>
                <p class="intro-txt animate-reveal">
                    Hi, Im Quinten Fisser<br />
                    This is my site.<br />
                    look around to get to know me
                </p>
                <div class="img-wrapper">
                    <img :src="'img/phone.svg'" alt="phone" id="phone-svg" class="floating2">
                    <img :src="'img/computer.svg'" alt="computer" id="pc-svg" class="floating3">
                    <img :src="'img/www.svg'" alt="web" id="www-svg" class="floating2">
                    <img :src="'img/cultures.svg'" alt="books" id="books-svg" class="floating">
                </div>
            </div>
            <div class="section" id="section1">
                <h1 id="header-section1">Who am I?</h1>
                <img :src="'img/desk.svg'" alt="icon" class="floating2 images-sec">
                <img :src="'img/think.svg'" alt="icon" class="floating2 images-fir">
                <h4 class="info-sec1">
                    My name is Quinten Fisser. <br/>
                    I am a Webdeveloper who is mainly focused on Front-end develoment<br/>
                    <hr>
                    I always try to work with the newest technolegies <br>and I always try to stay up-to-date with new UI develoments
                    <hr>
                    Frameworks I prefer to use:<br>
                </h4>
                <ul class="list-group framework-list">
                    <a href="http://www.reactjs.org" target="blank_"><li class="list-group-item">
                        React js   <img :src="'img/react.svg'" class="icon">
                    </li></a>
                    <a href="http://www.vuejs.org" target="blank_"><li class="list-group-item">
                        Vue js     <img :src="'img/vue.png'" class="icon">
                    </li></a>
                    <a href="http://www.laravel.com" target="blank_"><li class="list-group-item">
                        Laravel    <img :src="'img/laravel.svg'" class="icon">
                    </li></a>
                </ul>
            </div>
            <div class="section" id="section2">
                <h1 class="headertekst">My Work</h1>
                <img :src="'img/project.svg'" alt="icon" class="floating2 work-img">
                <img :src="'img/projector.svg'" alt="icon" class="floating work-img-two">
                <div class="cover">
                    <div class="card" v-for="post in posts" :key="post.id">
                        <div class="devider">
                            <div class="date-provider">
                                {{post.created_at | moment("MMM Do") }}
                            </div>
                            <img class="card-img-ani" onmouseover="changeIndex()" onmouseout="changeIndexBack()" v-bind:src="'/storage/cover_images/' + post.cover_image" alt="">
                        </div>
                        <div class="info-field">
                            <h3>{{post.title}}</h3>
                            <h4>{{post.sub}}</h4>
                            <span v-html="post.body"></span>
                            <button class="but-visit">&rarr; Visit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section" id="section-three">
                <h1>My skills</h1>
                <hr class="line">
                <div class="container-fluid skill-con">
                    <p>HTML</p>
                    <div class="container">
                    <div class="skills html">90%</div>
                    </div>

                    <p>CSS</p>
                    <div class="container">
                    <div class="skills css">80%</div>
                    </div>

                    <p>JavaScript</p>
                    <div class="container">
                    <div class="skills js">65%</div>
                    </div>

                    <p>PHP</p>
                    <div class="container">
                    <div class="skills php">60%</div>
                    </div>
                </div>
                <img :src="'img/talk.svg'" alt="icon" class="floating size-icon first-icon">
                <img :src="'img/worker.svg'" alt="icon" class="floating3 size-icon sec-icon">
                <img :src="'img/user.svg'" alt="icon" class="floating2 size-icon third-icon">
                <img :src="'img/skills.svg'" alt="icon" class="floating2 size-icon four-icon">
            </div>
        </full-page>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                posts: [],
                options: {
                    afterLoad: this.afterLoad,
                    scrollOverflow: true,
                    scrollBar: false,
                    menu: '#menu',
                    navigation: true,
                    anchors: ['page1', 'page2', 'page3']
                }
            }
        },
        created() {
            axios.get('./posts')
                .then(response => this.posts = response.data);
        },
        methods: {
            afterLoad() {
                console.log('After load')
            },
            addSection(e) {
                e.preventDefault()
                var newSectionNumber = document.querySelectorAll('.fp-section').length + 1
                // creating the section div
                var section = document.createElement('div')
                section.className = 'section'
                section.innerHTML = `<h3>Section ${newSectionNumber}</h3>`
                // adding section
                document.querySelector('#fullpage').appendChild(section)
                // creating the section menu element
                var sectionMenuItem = document.createElement('li')
                sectionMenuItem.setAttribute('data-menuanchor', 'page' + newSectionNumber)
                sectionMenuItem.innerHTML = `<a href="#page${newSectionNumber}">Section${newSectionNumber}</a>`
                // adding it to the sections menu
                var sectionsMenuItems = document.querySelector('#menu')
                sectionsMenuItems.appendChild(sectionMenuItem)
                // adding anchor for the section
                this.options.anchors.push(`page${newSectionNumber}`)
                // we have to call `update` manually as DOM changes won't fire updates
                // requires the use of the attribute ref="fullpage" on the
                // component element, in this case, <full-page>
                // ideally, use an ID element for that element too
                this.$refs.fullpage.build()
            },
            removeSection() {
                var sections = document.querySelector('#fullpage').querySelectorAll('.fp-section')
                var lastSection = sections[sections.length - 1]
                // removing the last section
                lastSection.parentNode.removeChild(lastSection)
                // removing the last anchor
                this.options.anchors.pop()
                // removing the last item on the sections menu
                var sectionsMenuItems = document.querySelectorAll('#menu li')
                var lastItem = sectionsMenuItems[sectionsMenuItems.length - 1]
                lastItem.parentNode.removeChild(lastItem)
            },
            toggleNavigation() {
                this.options.navigation = !this.options.navigation
            },
            toggleScrollbar() {
                console.log('Changing scrollbar...')
                this.options.scrollBar = !this.options.scrollBar
            }
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Alata&display=swap');

    * {
        font-family: 'Alata', sans-serif;
    }
</style>