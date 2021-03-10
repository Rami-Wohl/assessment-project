import React from "react";
import {Slider} from "@material-ui/core";

export const SliderBarOptions = (props) => {

    const defaultValue = 40;

    const handleChange = (event, newValue) => {
        props.updateAnswer(props.count, newValue);
    };

    return (
        <div className={'slider-component'}>
            <Slider id={props.count}
                    value={props.answer ? props.answer : defaultValue}
                    defaultValue={defaultValue}
                    onChange={handleChange}
                    min={10}
                    max={70}
            />
            <div className={'slider-values'}>
                <div>Helemaal mee oneens</div>
                <div>Helemaal mee eens</div>
            </div>
        </div>
    );
}