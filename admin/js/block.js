const { registerBlockType } = wp.blocks;
const { createBlock } = wp.blocks;

window.wpsiteFollowUsSettings = window.wpsiteFollowUsSettings || {};

const settings = window.wpsiteFollowUsSettings;
registerBlockType('wpsite-follow-us-badges/widget', {
    title: 'Follow Us Widget',
    icon: 'smiley',
    category: 'widgets',
    attributes: {
        title: {
            type: 'string',
            default: 'Follow Us Test', // Default title value
        },
    },
    edit: function ({ attributes, setAttributes }) {
        // Define a function to handle changes to the title attribute
        const onChangeTitle = (newValue) => {
            setAttributes({ title: newValue });
        };

        // Return the form fields for editing the widget settings
        return wp.element.createElement(
            'div',
            null,
            wp.element.createElement(
                'p',
                null,
                wp.element.createElement(
                    'label',
                    { htmlFor: 'follow-us-title' },
                    'Title:'
                ),
                wp.element.createElement(
                    'input',
                    {
                        id: 'follow-us-title',
                        className: 'widefat',
                        type: 'text',
                        value: attributes.title,
                        onChange: (event) => onChangeTitle(event.target.value),
                    }
                )
            )
        );
    },
    save: function({ attributes }) {
        return wp.element.createElement(
            'div',
            null,
            wp.element.createElement(
                'h2',
                null,
                attributes.title
            ),
            wp.element.createElement(
                wp.element.RawHTML,
                null,
                settings.content
            )
        );
    },
    transforms: {
        from: [
            {
                type: 'block',
                blocks: ['core/legacy-widget'],
                isMatch: ({ idBase, instance }) => {
                    if (!instance?.raw) {
                        // Can't transform if raw instance is not shown in REST API.
                        return false;
                    }
                    return idBase === 'wpsite_follow_us_badges'; // Replace 'wpsite_follow_us_badges' with the ID base of your legacy widget
                },
                transform: ({ instance }) => {
                    return createBlock('wpsite-follow-us-badges/widget', {
                        title: instance.raw.title, // Pass the title attribute from the legacy widget instance
                    });
                },
            },
        ],
    },
});

