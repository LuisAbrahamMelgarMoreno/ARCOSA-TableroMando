// file: src/plugins/casl/index.js

import { createMongoAbility } from '@casl/ability';
import { abilitiesPlugin } from '@casl/vue';

export default function (app) {
    const userAbilityRules = JSON.parse(localStorage.getItem('userAbilities')) || [];
    const initialAbility = createMongoAbility(userAbilityRules ?? [])

    app.use(abilitiesPlugin, initialAbility, {
        useGlobalProperties: true,
    })
}
