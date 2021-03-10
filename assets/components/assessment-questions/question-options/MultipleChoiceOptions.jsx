import React, {useState} from "react";

const getAnswerOptions = () => {
    return ([
        {
            id: 1,
            label: "Helemaal mee oneens",
            value: 1,
        },
        {
            id: 2,
            label: "Mee oneens",
            value: 2,
        },
        {
            id: 3,
            label: "Een beetje mee oneens",
            value: 3,
        },
        {
            id: 4,
            label: "Neutraal",
            value: 4,
        },
        {
            id: 5,
            label: "Een beetje mee eens",
            value: 5,
        },
        {
            id: 6,
            label: "Mee eens",
            value: 6,
        },
        {
            id: 7,
            label: "Helemaal mee eens",
            value: 7,
        }
    ])
}

export const MultipleChoiceOptions = (props) => {

    const [activeValue, setActive] = React.useState(props.answer ? props.answer : null);

    let options = getAnswerOptions();

    const handleChange = (event, newValue) => {
        setActive(newValue);
        props.updateAnswer(props.count, newValue);
    };

    return (
        <div className={'button-group-options'}>
            {options.map((option, i) =>
                <button key={i}
                        onClick={(e) => handleChange(e, option.value)}
                        className={activeValue === option.value ? 'mc-button selected' : 'mc-button'}>{option.label}</button>)}
        </div>
    )
}