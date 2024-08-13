const { RichText, InspectorControls } = wp.editor;
const { PanelBody, PanelRow } = wp.components;

export const Edit = (props) => {
    const {
        attributes: { title },
        setAttributes,
    } = props;

    const handleTitleChange = (value) => {
        setAttributes({ title: value })
    }

    return [
        <InspectorControls>
            <PanelBody
                title='Настройки блока'
                initialOpen={true}
            >
                <PanelRow>
                </PanelRow>
            </PanelBody>
        </InspectorControls>
        ,
        <RichText
            tagName="h2"
            onChange={handleTitleChange}
            value={title}
            className='title'
        />
    ]
}