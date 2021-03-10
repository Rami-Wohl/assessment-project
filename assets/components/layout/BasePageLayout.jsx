import React from 'react';

export const BasePageLayout = ({children, ...props}) => (
    <React.Fragment>
        <div className={'assessment-title'}>{props.title}</div>
        <div className={'assessment-container'}>{children}</div>
    </React.Fragment>
)
