import {Button, Input} from "@codenteq/interfeys";
import React from "react";

export default function Step4({data, setData}) {
    return (
        <>
            <div className="grid gap-5 mb-6 lg:grid-cols-2">
                <Input
                    name="telescope"
                    value={data.telescope}
                    onChange={(e) => setData('telescope', e.target.value)}
                    type="number"
                    label="Teleskop"
                    helpText="Kaç adet teleskop getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="telescope_brand"
                    value={data.telescope_brand}
                    onChange={(e) => setData('telescope_brand', e.target.value)}
                    type="text"
                    label="Teleskop markası"
                    className="block w-full"
                />
                <Input
                    name="swaddling"
                    value={data.swaddling}
                    onChange={(e) => setData('swaddling', e.target.value)}
                    type="number"
                    label="Kundak"
                    helpText="Kaç adet kundak getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="swaddling_brand"
                    type="text"
                    label="Kundak markası"
                    className="block w-full"
                />
                <Input
                    name="binocular"
                    value={data.binocular}
                    onChange={(e) => setData('binocular', e.target.value)}
                    type="number"
                    label="Dürbün"
                    helpText="Kaç adet dürbün getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="camera"
                    value={data.camera}
                    onChange={(e) => setData('camera', e.target.value)}
                    type="number"
                    label="Fotoğraf makinesi"
                    helpText="Kaç adet fotoğraf makinesi getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="tripod"
                    value={data.tripod}
                    onChange={(e) => setData('tripod', e.target.value)}
                    type="number"
                    label="Tripod"
                    helpText="Kaç adet tripod getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="walkie_talkie"
                    value={data.walkie_talkie}
                    onChange={(e) => setData('walkie_talkie', e.target.value)}
                    type="number"
                    label="Telsiz"
                    helpText="Kaç adet telsiz getirebilirsiniz?"
                    className="block w-full"
                />
                <Input
                    name="computer"
                    value={data.computer}
                    onChange={(e) => setData('computer', e.target.value)}
                    type="number"
                    label="Bilgisayar"
                    helpText="Kaç adet bilgisayar getirebilirsiniz?"
                    className="block w-full"
                />
            </div>
        </>
    )
}
