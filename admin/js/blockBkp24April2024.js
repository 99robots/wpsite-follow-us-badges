const { registerBlockType } = wp.blocks;
const { createBlock } = wp.blocks;

registerBlockType( 'wpsite-follow-us-badges/widget', {
    title: 'Follow Us Widget',
    icon: 'smiley',
    category: 'widgets',
    edit: function() {
        return wp.element.createElement(
            'div',
            null,
            'Follow Us Widget! This is the edit mode.'
        );
    },    
    save: function() {
        return wp.element.createElement(
            'div',
            null,
            'Follow Us Widget! This is the frontend view.'
        );
    },    
    transforms: {
        from: [
            {
                type: 'block',
                blocks: [ 'core/legacy-widget' ],
                isMatch: ( { idBase, instance } ) => {
                    if ( ! instance?.raw ) {
                        // Can't transform if raw instance is not shown in REST API.
                        return false;
                    }
                    return idBase === 'WPsiteFollowUs'; // Replace 'wpsite_follow_us_badges' with the ID base of your legacy widget
                },
                transform: ( { instance } ) => {
                    return createBlock( 'wpsite-follow-us-badges/widget', {
                        name: instance.raw.name,
                    } );
                },
            },
        ]
    },
} );

console.log('Hello Fahad Ahmed');
//alert('Hello Fahad Ahmed');
