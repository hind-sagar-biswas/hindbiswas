import "./bootstrap";

import "~bs/dist/js/bootstrap.js";

import.meta.glob(["../images/**"]);

import { addProjects } from "./carousel";
import { graphNode, DFS, generate, screenWidth } from "./maze";
import { revealSets, socialScrollSpy } from "./scrollspy";
import { typeWriterRepeat } from "./typewriter";

import "../sass/ext.scss";
import "../sass/main.scss";


async function getSkillList() {
    try {
        const response = await window.axios.get("/api/skill/all");
        console.log(response.data);
        return response.data.data.data;
    } catch (error) {
        console.error("Failed to Fetch Skills");
        console.error(error);
        return [];
    }
}

async function getLearnableList(group) {
    try {
        const response = await window.axios.get(`/api/learnable/group/${group}`);
        console.log(response.data);
        return response.data.data.data;
    } catch (error) {
        console.error(`Failed to Fetch ${group}`);
        console.error(error);
        return [];
    }
}

async function listSkills() {
    const skillList = await getSkillList();
    const skillListContainer = document.getElementById("skill-list");
    for (let index = 0; index < skillList.length; index++) {
        setTimeout(() => {
            const skill = skillList[index];

            const skillBox = document.createElement("div");
            skillBox.classList.add("skill");

            const icon = document.createElement("i");
            icon.classList.add("fa-solid", "fa-circle-check");
            skillBox.appendChild(icon);

            const text = document.createElement("span");
            text.textContent = skill;
            skillBox.appendChild(text);

            skillListContainer.appendChild(skillBox);
        }, 100 * index);
    }
}

async function listLanguages(target) {
    const languages = await getLearnableList('language');
    return new Promise((resolve, reject) => {
        const languageContainer = document.createElement("div");
        languageContainer.id = "langs";
        target.appendChild(languageContainer);

        let index = 0;

        for (const languageObjectName in languages) {
            if (Object.hasOwnProperty.call(languages, languageObjectName)) {
                const languageObj = languages[languageObjectName];

                const languageContainer = document.getElementById("langs");
                ((index) => {
                    setTimeout(() => {
                        const language = document.createElement("div");
                        language.classList.add("tag");

                        const icon = document.createElement("i");
                        icon.classList.add(
                            languageObj.icon[0],
                            languageObj.icon[1]
                        );
                        language.appendChild(icon);

                        const text = document.createElement("span");
                        text.textContent = ` ${languageObj.name}`;
                        language.appendChild(text);

                        languageContainer.appendChild(language);

                        if (index >= Object.keys(languages).length - 1) {
                            resolve();
                        }
                    }, 100 * index);
                })(index);
                index++;
            }
        }
    });
}

async function listFrameworks(target) {
    const frameworks = await getLearnableList('framework');
    const frameworkContainer = document.createElement("div");
    frameworkContainer.id = "frameworks";
    target.appendChild(frameworkContainer);

    let index = 0;
    for (const frameworkObjectName in frameworks) {
        if (Object.hasOwnProperty.call(frameworks, frameworkObjectName)) {
            const frameworkObj = frameworks[frameworkObjectName];
            const frameworkContainer = document.getElementById("frameworks");

            setTimeout(() => {
                const framework = document.createElement("div");
                framework.classList.add("tag");

                const icon = document.createElement("i");
                icon.classList.add(frameworkObj.icon[0], frameworkObj.icon[1]);
                framework.appendChild(icon);

                const text = document.createElement("span");
                text.textContent = ` ${frameworkObj.name}`;
                framework.appendChild(text);

                frameworkContainer.appendChild(framework);
            }, 100 * index);
            index++;
        }
    }
}

function listLanguagesAndFrameworks() {
    const listContainer = document.getElementById("language-list");
    listLanguages(listContainer).then(() => {
        listFrameworks(listContainer);
    });
}

const button = document.getElementById("go-to-top");
const windowWidth = window.innerWidth;

function showButton() {
    if (windowWidth <= 800 && window.scrollY > 0) {
        button.classList.remove("hide-comp");
    } else {
        button.classList.add("hide-comp");
    }
}
window.addEventListener("scroll", showButton);

typeWriterRepeat(
    "type-writer-target",
    "Programmer",
    "Full-stack dev",
    "UI/UX Designer"
);

addProjects();

window.addEventListener("load", () => {
    // Executions: MAZE
    if (screenWidth > 750) {
        generate();
        DFS();
    }

    // Others
    socialScrollSpy("first-section", "scroll-target");
    revealSets("skill-list", "skills", () => {
        listSkills();
    });
    revealSets("language-list", "languages", () => {
        listLanguagesAndFrameworks();
    });
});
