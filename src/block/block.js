import { Edit, Save } from '.';

const { registerBlockType } = wp.blocks;

registerBlockType('company/block', {
    title: 'Блок',
    icon: 'admin-customizer',
    category: 'custom-blocks',
    keywords: ['Блок'],
    attributes: {
        title: {
            type: 'array',
            source: 'children',
            selector: '.title',
            default: 'Заголовок'
        },
    },
    edit: Edit,
    save: Save
})