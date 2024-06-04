import {Button, Input, Label} from "@codenteq/interfeys";
import React, {useState} from "react";

export default function Step3({data, setData}) {
    const [dontCampingEquipment, setDontCampingEquipment] = useState(false);

    const handleDontCampingEquipmentChange = (event) => {
        setData('dont_camping_equipment', event.target.checked)
        setDontCampingEquipment(event.target.checked);
    };

    return (
        <>
            <div>
                <div className="flex items-center gap-3 mb-6">
                    <Input
                        name="dont_camping_equipment"
                        id="dont_camping_equipment"
                        type="checkbox"
                        checked={dontCampingEquipment}
                        onChange={handleDontCampingEquipmentChange}
                    />
                    <Label htmlFor="dont_camping_equipment">
                        Kamp malzemelerini (Çadır, sandalye, tulum vb.),
                        uygun bir fiyata kamp alanından temin etmek ister misiniz?
                    </Label>
                </div>

                {dontCampingEquipment && (
                    <div className="grid gap-5 mb-6 lg:grid-cols-2">
                        <Input
                            name="tent"
                            value={data.tent}
                            onChange={(e) => setData('tent', e.target.value)}
                            type="number"
                            label="Çadır"
                            helpText="Kaç adet çadır getirebilirsiniz?"
                            className="block w-full"
                        />
                        <Input
                            name="sleeping_bag"
                            value={data.sleeping_bag}
                            onChange={(e) => setData('sleeping_bag', e.target.value)}
                            type="number"
                            label="Uyku tulumu"
                            helpText="Kaç adet uyku tulumu getirebilirsiniz?"
                            className="block w-full"
                        />
                        <Input
                            name="Mat"
                            value={data.mat}
                            onChange={(e) => setData('mat', e.target.value)}
                            type="number"
                            label="Mat"
                            helpText="Kaç adet mat getirebilirsiniz?"
                            className="block w-full"
                        />
                        <Input
                            name="chair"
                            value={data.chair}
                            onChange={(e) => setData('chair', e.target.value)}
                            type="number"
                            label="Sandalye"
                            helpText="Kaç adet sandalye getirebilirsiniz?"
                            className="block w-full"
                        />
                    </div>
                )}
            </div>
        </>
    )
}