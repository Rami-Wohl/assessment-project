import React from 'react'
import { withRouter } from 'react-router-dom'

const LinkButton = (props) => {
    const {
        history,
        to,
        onClick,
        staticContext,
        ...rest
    } = props
    return (
        <button
            {...rest}
            className={'nav-button'}
            onClick={(e) => {
                onClick && onClick(e)
                history.push(to)
            }}
        />
    )
}

export default withRouter(LinkButton)